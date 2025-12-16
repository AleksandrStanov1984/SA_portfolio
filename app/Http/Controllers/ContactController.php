<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use App\Mail\ContactAutoReplyMail;

class ContactController extends Controller
{
    public function send(string $locale, ContactRequest $request)
    {
        // Устанавливаем язык
        app()->setLocale($locale);

        // Данные
        $data = $request->validated();
        $data['locale'] = $locale;

        // Сохраняем в базу
        ContactMessage::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'topic'   => $data['topic'],
            'message' => $data['message'],
            'ip'      => $request->ip(),
            'locale'  => $locale,
        ]);

        // Кому отправляем
        $adminEmail = env('MAIL_TO');    // ты
        $clientEmail = $data['email'];   // клиент

        try {

            // --- Письмо тебе ---
            Mail::to($adminEmail)->send(new ContactMessageMail($data));

            // --- Автоответ клиенту ---
            //   Mail::to($clientEmail)->send(new ContactAutoReplyMail($data));

            return response()->json(['ok' => true]);

        } catch (\Throwable $e) {

            return response()->json([
                'ok' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
