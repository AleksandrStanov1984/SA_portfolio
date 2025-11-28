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
        app()->setLocale($locale);

        $data = $request->validated();
        $data['locale'] = $locale; // ← добавляем язык в payload

        ContactMessage::create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'topic'   => $data['topic'],
            'message' => $data['message'],
            'ip'      => $request->ip(),
            'locale'  => $locale,
        ]);

        try {
            // письмо тебе
            Mail::to(env('MAIL_TO'))
                ->send(new ContactMessageMail($data));  // ← удалили $locale (оно уже в $data)

            // автоответ — получит язык из $data['locale']
            Mail::to($data['email'])
                ->send(new ContactAutoReplyMail($data));

            return response()->json(['ok' => true]);

        } catch (\Throwable $e) {
            return response()->json(['ok' => false], 500);
        }
    }

}
