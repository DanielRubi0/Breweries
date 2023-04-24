<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactNotification;

class ContactController extends Controller
{
    //

    public function store (Request $request) {
        $nombre = $request->input('name');
        $email = $request->input('email');
        
        $message = $request->message;
        Mail::to(env("MAIL_FROM_ADDRESS"))->send(
            new ContactNotification(
                $nombre, 
                $email, 
                $message
            )
        );

        return back() ->with ('code', 0) -> with ('message', 'Mensaje enviado correctamente');

    }
}
