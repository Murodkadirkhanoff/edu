<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse|View
    {
        if ($request->method() === 'GET') {
            return view('pages.auth.login');
        }
        // Удалим префикс +998 и пробелы
        $cleaned = str_replace(['+998', ' '], '', $request->phone_number);
        $otp = rand(100000, 999999);
        $otp = 111111;
        User::updateOrCreate(
            [
                'phone_number' => $cleaned
            ],
            [
                'otp_code' => $otp,
                'otp_expires_at' => now()->addMinute(),
                'password' => Hash::make('password'),
            ]
        );

        // Сохраняем роль в сессии
        session(['login.role' => $request->role]);

        //Auth::login($user); // авторизуем вручную
        //$request->session()->regenerate();

        return view('pages.auth.verify')->with(['phone_number' => $request->phone_number]);

    }

    public function verify(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'phone_number' => ['required'],
            'otp_code' => ['required', 'digits:6']
        ]);

        $cleaned = str_replace(['+998', ' '], '', $request->phone_number);
        $user = User::where('phone_number', $cleaned)->first();

        if (
            !$user
            || is_null($user->otp_expires_at)
            || now()->gt($user->otp_expires_at)
        ) {
            return back()->withErrors(['otp' => 'Код просрочен или некорректен']);
        }

        if ($user->otp_code !== $request->otp_code) {
            return back()->withErrors(['otp' => 'Неверный код']);
        }

        $user->otp_code = null;
        $user->otp_expires_at = null;
        $user->save();


//        // Получаем роль из сессии
//        $role = session('login.role');
//        if (! $role) {
//            return response()->json(['error' => 'Role not found'], 422);
//        }

        $user->assignRole(Roles::ADMIN);
        $user->assignRole(Roles::INSTRUCTOR);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'phone_number' => ['required'],
        ]);

        $cleaned = str_replace(['+998', ' '], '', $request->phone_number);
        $otp = rand(100000, 999999);
        $otp = 222222;

        User::updateOrCreate(
            ['phone_number' => $cleaned],
            [
                'otp_code' => $otp,
                'otp_expires_at' => now()->addMinute(),
            ]
        );

        return response()->json(['message' => 'Kod qayta yuborildi']);
    }
}
