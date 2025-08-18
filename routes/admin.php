<?php


use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', fn() => view('pages.admin.dashboard'))->name('dashboard');
Route::get('courses', [CourseController::class,'index'])->name('courses');
Route::get('courses/{id}', [CourseController::class,'show'])->name('courses.show');
Route::patch('courses/{course}/status', [CourseController::class,'updateStatus'])->name('courses.status.update');
