<?php

namespace App\Http\Controllers\Instructor;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Enums\LessonStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Jobs\ProcessLessonVideo;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\FileContent;
use App\Models\Lesson;
use App\Models\LessonContent;
use App\Models\LinkContent;
use App\Models\TextContent;
use App\Models\VideoContent;
use App\Services\Instructor\LessonService;
use App\Services\Media\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CourseLessonController extends Controller
{

    public function __construct(protected LessonService $lessonService, protected FileServiceInterface $fileService)
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required',
            'title' => 'required|string',
            'price' => 'nullable|numeric|min:0',
            'is_free' => 'nullable|boolean',
            'type' => 'required|in:1,2',
            'video_content' => 'required_if:content_type,1',
            'text_content' => 'required_if:content_type,2',
            'attachments.*' => 'file|max:10240',
        ]);

        if ($validated['is_free']) {
            $validated['price'] = 0;
        }

        $lesson = new Lesson($validated);
        $lesson->sort_order = Lesson::where('module_id', $validated['module_id'])->max('sort_order') + 1;
        $lesson->save();

        if ($request->hasFile('video_content')) {

            $file = $request->file('video_content');
            // Save locally first
            $localPath = $file->store('tmp', 'local');
            $lesson->update([
                'status' => LessonStatus::PROCESSING->value,
            ]);
            ProcessLessonVideo::dispatch($lesson->id, $localPath);
        }

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $this->fileService->upload(
                    $file,
                    type: FileType::ATTACHMENT->value,
                    fileable: $lesson,
                    pathPrefix: FilePrefix::LESSON_ATTACHMENT->value
                );
            }
        }

        return redirect()->back()->with('success', 'Lesson created successfully.');
    }

    public function stream($lessonId, Request $request)
    {
        $lesson = Lesson::find($lessonId);
        // Проверка доступа (например, пользователь купил курс)
//        if (!auth()->user()->canView($lesson)) {
//            abort(403);
//        }
        $disk = Storage::disk('wasabi');
        if (!$disk->exists($lesson->video->path)) {
            abort(404);
        }



        // Получаем stream из Wasabi
        $stream = $disk->readStream($lesson->video->path);
        $filesize = $disk->size($lesson->video->path);

        $start = 0;
        $length = $filesize;
        $status = 200;
        $headers = [
            'Content-Type' => 'video/mp4',
            'Accept-Ranges' => 'bytes',
        ];

        if ($request->headers->has('Range')) {
            [$param, $range] = explode('=', $request->header('Range'), 2);
            if ($param === 'bytes') {
                [$start, $end] = explode('-', $range);
                $start = intval($start);
                $end = $end !== "" ? intval($end) : $filesize - 1;
                $length = $end - $start + 1;
                $status = 206;
                $headers['Content-Range'] = "bytes {$start}-{$end}/{$filesize}";
                $headers['Content-Length'] = $length;
            }
        }

        return response()->stream(function () use ($stream, $start, $length) {
            fseek($stream, $start);
            $buffer = 1024 * 8;
            $bytesLeft = $length;

            while ($bytesLeft > 0 && !feof($stream)) {
                $chunk = fread($stream, min($buffer, $bytesLeft));
                echo $chunk;
                flush();
                $bytesLeft -= strlen($chunk);
            }

            fclose($stream);
        }, $status, $headers);
    }

    public function delete($lessonId)
    {
        $this->lessonService->deleteLesson($lessonId);
        // 5) Вернуть ответ
        return redirect()
            ->back()
            ->with('success', 'Урок успешно удалён');
    }

    public function sort(Request $request)
    {
        $data = $request->validate([
            'module_id' => 'required',
            'order' => 'required|array',
            'order.*' => 'integer',
        ]);

        foreach ($data['order'] as $sortOrder => $lessonId) {
            Lesson::where('id', $lessonId)
                ->update(['sort_order' => $sortOrder + 1]);
        }

        return response()->json(['status' => 'ok']);
    }

}
