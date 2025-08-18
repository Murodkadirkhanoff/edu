<?php

namespace App\Http\Controllers\Instructor;

use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use App\Enums\Languages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $nextSortOrder = CourseModule::where('course_id', $course->id)->max('sort_order') ?? 0;

        $course->modules()->create([
            'title' => $request->title,
            'sort_order' => $nextSortOrder + 1
        ]);

        return redirect()->back()->with(['success' => true]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        CourseModule::find($request->module_id)->update([
            'title' => $request->title
        ]);

        return redirect()->back()->with(['success' => 'Module updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
