<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\CourseLessonController;
use App\Http\Controllers\Instructor\CourseModuleController;
use App\Http\Controllers\Media\FileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', fn() => view('pages.instructor.dashboard'))->name('dashboard');
Route::resource('courses', CourseController::class);
Route::get('course/{course}/curriculum', [CourseController::class, 'curriculum'])->name('courses.curriculum');


/* Module */
Route::post('courses/{course}/modules/create', [CourseModuleController::class, 'store'])->name('courses.module.create');
Route::put('courses/{course}/modules/update', [CourseModuleController::class, 'update'])->name('courses.module.update');


/* Lesson */
Route::post('courses/{course}/lessons/create', [CourseLessonController::class, 'store'])->name('lessons.create');
Route::put('course/{lesson}/update', [CourseLessonController::class, 'update'])->name('courses.update_lesson');

Route::get('/lessons/{lesson}/delete', [CourseLessonController::class, 'delete'])->name('lessons.delete');
Route::post('/lessons/sort', [CourseLessonController::class, 'sort'])->name('lessons.sort');
