<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->locale = $data['locale'] ?? 'en';
    }

    public function build()
    {
        app()->setLocale($this->locale);

        return $this
            ->subject(__('portfolio.mail_admin_subject'))
            ->view('emails.contact-message')
            ->with(['data' => $this->data]);
    }
}
