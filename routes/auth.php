<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::match(['get', 'post'],'/login', [AuthController::class, 'authenticate'])->name('login');
Route::post('/verify-otp', [AuthController::class, 'verify'])->middleware('throttle:10,1')->name('verify_otp');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->middleware('throttle:10,1')->name('resend_otp');
