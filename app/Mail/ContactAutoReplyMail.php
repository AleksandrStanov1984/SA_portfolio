<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class ContactAutoReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public $locale;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->locale = $data['locale'] ?? 'en';
    }

    public function build()
    {
        app()->setLocale($this->locale);

        return $this
            ->subject(__('portfolio.mail_autoreply_subject'))
            ->view('emails.contact-autoreply')
            ->with(['data' => $this->data]);
    }
}
