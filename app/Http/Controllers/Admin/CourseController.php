<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::whereNotIn('status', [CourseStatus::DRAFT->value])
            ->latest()
            ->paginate(20);

        return view('pages.admin.courses.index', compact('courses'));
    }

    public function show(int $id)
    {
        $course = Course::find($id);
        return view('pages.admin.courses.show', compact('course'));
    }

    public function updateStatus(Request $request, $id)
    {
        $course = Course::find($id);
        $course->status = $request->status;
        $course->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    }
}
