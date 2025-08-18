<?php

namespace App\Http\Controllers\Instructor;

use App\Contracts\Services\FileServiceInterface;
use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use App\Enums\FilePrefix;
use App\Enums\FileType;
use App\Enums\Languages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\FileContent;
use App\Models\Lesson;
use App\Models\LessonContent;
use App\Models\LinkContent;
use App\Models\TextContent;
use App\Models\VideoContent;
use App\Services\Instructor\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private CourseService $courseService;

    public function __construct(CourseService $courseService, protected FileServiceInterface $fileService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('instructor_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('pages.instructor.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang = app()->getLocale();   // uz / ru / en

        // [id ⇒ title] для корневых категорий
        $roots = Category::whereNull('parent_id')
            ->pluck("title_$lang", 'id')
            ->toArray();

        // [parent_id ⇒ [sub_id ⇒ title]]
        $subs = Category::whereNotNull('parent_id')
            ->get()
            ->groupBy('parent_id')
            ->map(fn($g) => $g->pluck("title_$lang", 'id')->toArray())
            ->toArray();

        $languageOptions = Languages::toSelectOptions();
        $courseLevelsOptions = CourseLevel::toSelectOptions();
        $courseStatuses = CourseStatus::toInstructorOptions();
        return view('pages.instructor.courses.create', compact('languageOptions', 'courseLevelsOptions', 'courseStatuses', 'roots', 'subs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {

        // Валидация уже выполнена в StoreCourseRequest
        $data = $request->validated();


        // Делаем оставшуюся бизнес-логику в сервисе
        $course = $this->courseService->createCourse($data);
        $course->categories()->sync([$data['subcategory_id']]);

        return redirect()
            ->route('instructor.courses.edit', $course)
            ->with('success', 'Курс создан успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('pages.instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lang = app()->getLocale();   // uz / ru / en

        // [id ⇒ title] для корневых категорий
        $roots = Category::whereNull('parent_id')
            ->pluck("title_$lang", 'id')
            ->toArray();

        // [parent_id ⇒ [sub_id ⇒ title]]
        $subs = Category::whereNotNull('parent_id')
            ->get()
            ->groupBy('parent_id')
            ->map(fn($g) => $g->pluck("title_$lang", 'id')->toArray())
            ->toArray();
        $course = Course::find($id);

        $subcategory_id = $course->categories->first()->id;
        $category_id = Category::find($subcategory_id)->parent_id;

        $languageOptions = Languages::toSelectOptions();

        $courseLevelsOptions = CourseLevel::toSelectOptions();
        $courseStatuses = CourseStatus::toInstructorOptions();
        return view('pages.instructor.courses.edit', compact('languageOptions', 'courseLevelsOptions', 'courseStatuses', 'roots', 'subs', 'course', 'languageOptions', 'subs', 'category_id', 'subcategory_id', 'category_id'));

    }


    public function curriculum(Course $course)
    {
        return view('pages.instructor.courses.curriculum', compact('course'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, Course $course)
    {

        // Валидация уже выполнена в StoreCourseRequest
        $data = $request->validated();

        // Делаем оставшуюся бизнес-логику в сервисе
        $course = $this->courseService->updateCourse($data, $course);
        $course->categories()->sync([$data['subcategory_id']]);

        return redirect()
            ->route('instructor.courses.edit', $course)
            ->with('success', 'Курс создан успешно');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
