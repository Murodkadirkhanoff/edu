<?php

use App\Http\Controllers\Common\CategoryController;
use App\Http\Controllers\Media\FileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
// KOROCHE

Route::view('/', 'pages.public.main')->name('main');
Route::view('/about', 'pages.common.about')->name('about');
Route::view('/support', 'pages.common.support')->name('support');
Route::view('/help-center', 'pages.common.help_center')->name('help_center');
Route::view('/contacts', 'pages.common.contacts')->name('contacts');


// File handling
Route::get('/files/{id?}', [FileController::class, 'show'])->name('files.show');
Route::get('/files/{id}/download', [FileController::class, 'download'])->name('files.download');

Route::get('/lessons/{lesson}/stream', [\App\Http\Controllers\Instructor\CourseLessonController::class, 'stream']);

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('courses/{course}', [\App\Http\Controllers\Common\CourseController::class, 'show'])->name('courses.show');

Route::post('/telegram/webhook', [\App\Http\Controllers\Auth\TelegramController::class, 'handleWebhook']);
Route::any('profile', [\App\Http\Controllers\Common\ProfileController::class, 'profile'])->name('profile');
