<?php

namespace App\Http\Controllers\Instructor;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
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
            $this->fileService->upload(
                $request->file('video_content'),
                type: FileType::LESSON_VIDEO->value,
                fileable: $lesson,
                pathPrefix: FilePrefix::LESSON_VIDEO->value
            );
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

    public function stream($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        // Проверка доступа (например, пользователь купил курс)
//        if (!auth()->user()->canView($lesson)) {
//            abort(403);
//        }
        $path = Storage::disk()->path($lesson->video->path);

        if (!file_exists($path)) {
            abort(405);
        }

        $mime = mime_content_type($path);
        $size = filesize($path);
        $start = 0;
        $length = $size;

        // Обработка range-запроса
        if (request()->header('Range')) {
            preg_match('/bytes=(\d+)-(\d+)?/', request()->header('Range'), $matches);
            $start = intval($matches[1]);
            $end = isset($matches[2]) ? intval($matches[2]) : $size - 1;
            $length = $end - $start + 1;

            $headers = [
                'Content-Type' => $mime,
                'Content-Length' => $length,
                'Content-Range' => "bytes $start-$end/$size",
                'Accept-Ranges' => 'bytes',
            ];

            $responseCode = 206;
        } else {
            $headers = [
                'Content-Type' => $mime,
                'Content-Length' => $size,
                'Accept-Ranges' => 'bytes',
            ];

            $responseCode = 200;
        }

        return new StreamedResponse(function () use ($path, $start, $length) {
            $handle = fopen($path, 'rb');
            fseek($handle, $start);
            echo fread($handle, $length);
            fclose($handle);
        }, $responseCode, $headers);
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
