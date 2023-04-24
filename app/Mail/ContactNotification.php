<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;
    public string $cnname;
    public string $cnfrom;
    public string $cnbody;

    public function __construct($name, $from, $body)
    {
        //
        $this->cnname = $name;
        $this->cnfrom = $from;
        $this->cnbody = $body;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Contacto desde la web',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    public function attachments()
    {
        return [];
    }
}
