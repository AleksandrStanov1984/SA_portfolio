<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrevoMailService
{
    public static function send(array $data): void
    {
        Http::withHeaders([
            'api-key' => config('services.brevo.key'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'email' => config('services.brevo.from_email'),
                'name' => config('services.brevo.from_name'),
            ],
            'to' => [
                ['email' => $data['to']],
            ],
            'subject' => $data['subject'],
            'htmlContent' => $data['html'],
        ])->throw();
    }
}
