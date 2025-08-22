<?php

namespace App\Jobs;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Enums\LessonStatus;
use App\Models\Lesson;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProcessLessonVideo implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $lessonId, public $localPath)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(FileServiceInterface $fileService): void
    {
        $lesson = Lesson::find($this->lessonId);
        if (!$lesson) return;

        $absolutePath = storage_path("app/private/{$this->localPath}");

        // ffprobe для duration
        $cmd = "ffprobe -v quiet -print_format json -show_format \"$absolutePath\"";
        $output = shell_exec($cmd);
        $data = json_decode($output, true);

        $duration = $data['format']['duration'] ?? null;

        // Создаём UploadedFile из локального пути
        $uploadedFile = new UploadedFile(
            $absolutePath,
            basename($absolutePath)
        );

        $fileService->upload(
            uploadedFile: $uploadedFile,
            type: FileType::LESSON_VIDEO->value,
            fileable: $lesson,
//            disk: 'wasabi',
            pathPrefix: FilePrefix::LESSON_VIDEO->value
        );

        // save back to DB
        $lesson->video->update([
            'duration' => $duration ? round($duration) : null
        ]);

        $lesson->update([
            'status' => LessonStatus::READY->value,
        ]);
        // cleanup
        unlink($absolutePath);
    }
}
