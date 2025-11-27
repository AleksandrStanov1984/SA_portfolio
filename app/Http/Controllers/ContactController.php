<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;


class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
       $data = $request->validated();

       // Log in DB
       ContactMessage::create([
           'name'    => $data['name'],
           'email'   => $data['email'],
           'phone'   => $data['phone'],
           'topic'   => $data['topic'],
           'message' => $data['message'],
           'ip'      => $request->ip(),
       ]);

       try {
           Mail::to(env('MAIL_TO'))
               ->send(new ContactMessageMail($data));

           return response()->json(['ok' => true]);
       } catch (\Throwable $e) {
           return response()->json(['ok' => false], 500);
       }
    }

}
