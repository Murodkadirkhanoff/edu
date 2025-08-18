<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Show the home page.
     */
    public function home(Request $request): RedirectResponse|View
    {
        $featuredCourses = Course::where('status', 2)
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::root()
            ->withCount('courses')
            ->take(8)
            ->get();

        return view('pages.public.main', compact('featuredCourses', 'categories'));
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show all courses.
     */
    public function courses(Request $request)
    {
        $query = Course::where('status', 2)->with(['instructor', 'categories']);

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereRaw("title->>'en' ILIKE ?", ["%{$search}%"])
                  ->orWhereRaw("title->>'ru' ILIKE ?", ["%{$search}%"])
                  ->orWhereRaw("title->>'uz' ILIKE ?", ["%{$search}%"]);
            });
        }

        $courses = $query->latest()->paginate(12);
        $categories = Category::root()->withCount('courses')->get();

        return view('pages.courses.index', compact('courses', 'categories'));
    }

    /**
     * Show a single course.
     */
    public function courseShow(Course $course)
    {
        $course->load(['instructor', 'categories', 'modules.lessons']);

        $relatedCourses = Course::where('status', 2)
            ->where('id', '!=', $course->id)
            ->whereHas('categories', function ($q) use ($course) {
                $q->whereIn('id', $course->categories->pluck('id'));
            })
            ->take(4)
            ->get();

        return view('pages.courses.show', compact('course', 'relatedCourses'));
    }

    /**
     * Show courses by category.
     */
    public function category(Category $category)
    {
        $courses = Course::where('status', 2)
            ->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category->id);
            })
            ->with(['instructor', 'categories'])
            ->paginate(12);

        return view('pages.categories.show', compact('category', 'courses'));
    }

    /**
     * Show all instructors.
     */
    public function instructors()
    {
        $instructors = User::role('instructor')
            ->withCount('courses')
            ->having('courses_count', '>', 0)
            ->paginate(12);

        return view('pages.instructors.index', compact('instructors'));
    }

    /**
     * Show a single instructor.
     */
    public function instructorShow(User $instructor)
    {
        $courses = Course::where('instructor_id', $instructor->id)
            ->where('status', 2)
            ->with('categories')
            ->paginate(12);

        return view('pages.instructors.show', compact('instructor', 'courses'));
    }
}
