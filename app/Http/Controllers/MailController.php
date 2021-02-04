<?php

namespace App\Http\Controllers;

use App\Mail\UserContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Flash;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    /**
     *
     */
    public function sendMail(Request $request) {
        $from = env('MAIL_USERNAME');
        $to = $request->email;

        $inputs = (object) [
            'from' => $from,
            'to' => $to,
            'name' => $request->name,
            'company' => $request->company,
            'phone' => $request->phone,
            'website' => env('APP_URL'),
            'subject' => $request->subject,
            'message' => $request->message
        ];

        // email to company
        Mail::to($from)->send(new ContactMail($inputs));
        // email to user
        Mail::to($to)->send(new UserContactMail($inputs));

        return back()->with('msg', 'Mensagem enviada com sucesso!');
    }
}
