<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Roles;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $data = $request->all();
        Log::info('Telegram webhook received', $data);

        $message = $data['message'] ?? null;
        $callbackQuery = $data['callback_query'] ?? null;

        $chatId = $message['chat']['id'] ?? null;
        $telegramId = $message['from']['id'] ?? null;
        $contact = $message['contact'] ?? null;
        $phoneNumber = $contact['phone_number'] ?? null;
        $textCommand = $message['text'] ?? null;

        // ✅ Если inline кнопка нажата
        if ($callbackQuery) {
            $callbackData = $callbackQuery['data'] ?? null;
            $chatId = $callbackQuery['message']['chat']['id'];
            $telegramId = $callbackQuery['from']['id'];

            if ($callbackData === 'auth') {
                $this->handleAuth($chatId, null, $telegramId);

                // Остановить "Loading..." у кнопки
                Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/answerCallbackQuery", [
                    'callback_query_id' => $callbackQuery['id']
                ]);
            }

            return response()->noContent();
        }

        // ✅ Если отправлен номер телефона
        if ($phoneNumber) {
            $this->handlePhoneNumber($chatId, $phoneNumber, $telegramId);
            return response()->noContent();
        }

        // ❓ Любой другой случай – показать кнопку
        $this->sendCommandMenu($chatId);
        return response()->noContent();
    }

    private function handleAuth($chatId, $phoneNumber, $telegramId)
    {
        $user = User::where('telegram_id', $telegramId)
            ->orWhere('phone_number', $phoneNumber)
            ->first();
    ;
        if ($user) {
            $user->telegram_id = $telegramId;
            $user->phone_number = $phoneNumber ?? $user->phone_number;
            $user->save();

            $this->sendOtp($user, $chatId);
        } else {
            $this->sendContactRequest($chatId);
        }
    }

    private function handlePhoneNumber($chatId, $phoneNumber, $telegramId)
    {
        $user = User::where('telegram_id', $telegramId)
            ->orWhere('phone_number', $phoneNumber)
            ->first();

        if (!$user) {
            $user = User::create([
                'telegram_id' => $telegramId,
                'phone_number' => $phoneNumber,
                'password' => Hash::make('password'),
            ]);
        }

        $user->telegram_id = $telegramId;
        $user->save();

        $this->sendOtp($user, $chatId);
    }

    private function sendOtp(User $user, $chatId)
    {
        $now = now();

        if ($user->otp_code && $user->otp_expires_at && $user->otp_expires_at->isFuture()) {
            $this->sendMessage($chatId, "Ваш предыдущий код: {$user->otp_code} (ещё действителен)");
            return;
        }

        if ($user->otp_expires_at && $user->otp_expires_at->diffInSeconds($now) < 60) {
            $this->sendMessage($chatId, "Пожалуйста, подождите 1 минуту перед повторным запросом.");
            return;
        }

        $otp = rand(100000, 999999);
        $user->otp_code = $otp;
        $user->otp_expires_at = $now->addMinutes(2);
        $user->save();

        $this->sendMessage($chatId, "Ваш код подтверждения: $otp (действителен 2 минут)");
    }

    private function sendContactRequest($chatId)
    {
        $keyboard = [
            'keyboard' => [[[
                'text' => '📱 Отправить номер телефона',
                'request_contact' => true
            ]]],
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];

        $this->sendMessage($chatId, 'Пожалуйста, отправьте номер телефона:', $keyboard);
    }

    private function sendCommandMenu($chatId)
    {
        $keyboard = [
            'inline_keyboard' => [
                [
                    [
                        'text' => '🔐 Kod olish',
                        'callback_data' => 'auth',
                    ]
                ]
            ]
        ];

        //        $keyboard = [
//            'keyboard' => [
//                [['text' => '🔐 Authentication']],
//            ],
//            'resize_keyboard' => true,
//            'one_time_keyboard' => true,
//        ];

        $this->sendMessage($chatId, 'Нажмите 🔐 Kod olish для начала авторизации', $keyboard);
    }

    private function sendMessage($chatId, $text, $keyboard = null)
    {
        $data = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        if ($keyboard) {
            $data['reply_markup'] = json_encode($keyboard);
        }

        Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage", $data);
    }
}
