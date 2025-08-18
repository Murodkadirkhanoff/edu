<?php

namespace App\Services\Instructor;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Models\Course;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected FileServiceInterface $fileService)
    {
        //
    }

    public function createCourse(array $data): Course
    {
        return DB::transaction(function () use ($data) {
            $data['instructor_id'] = auth()->id();
            // Создаём сам курс
            $course = Course::create($data);

            if (!empty($data['thumbnail'])) {
                $this->fileService->upload(
                    $data['thumbnail'],
                    type: FileType::THUMBNAIL->value,
                    fileable: $course,
                    pathPrefix: FilePrefix::THUMBNAIL->value
                );
            }

            return $course;
        });
    }

    public function updateCourse(array $data, $course): Course
    {
        return DB::transaction(function () use ($data, $course) {
            // Создаём сам курс
            $course->update($data);

            if (!empty($data['thumbnail'])) {
                $this->fileService->delete($course->thumbnail);
                $this->fileService->upload(
                    $data['thumbnail'],
                    type: FileType::THUMBNAIL->value,
                    fileable: $course,
                    pathPrefix: FilePrefix::THUMBNAIL->value
                );
            }

            return $course;
        });
    }
}
