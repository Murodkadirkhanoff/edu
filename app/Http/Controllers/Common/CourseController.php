<?php

namespace App\Http\Controllers\Common;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        $lesson_id = request()->get('lesson_id');
        if ($lesson_id) {
            $lesson = Lesson::find($lesson_id);
        } else {
            $lesson = Lesson::whereHas('module', function ($q) use ($course) {
                $q->where('course_id', $course->id);
            })
                ->orderBy('id')
                ->first();
        }

        return view('pages.common.course', compact('course', 'lesson'));
    }
}
