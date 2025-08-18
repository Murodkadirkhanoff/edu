<?php

namespace App\Http\Controllers\Common;

use App\Enums\CourseStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $courses = $category->courses()->with(['instructor', 'categories'])->where('status', CourseStatus::PUBLISHED->value)->paginate(12);
        return view('pages.common.category', compact('category','courses'));
    }
}
