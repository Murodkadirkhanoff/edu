<?php

namespace App\Services\Instructor;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Models\Course;
use App\Models\File;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LessonService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected FileServiceInterface $fileService)
    {
        //
    }

    public function deleteLesson(int $lessonId): void
    {
        $lesson = Lesson::with('files')->findOrFail($lessonId);

        foreach ($lesson->files as $file) {
            $this->fileService->delete($file);
        }

        $lesson->delete();
    }
}
