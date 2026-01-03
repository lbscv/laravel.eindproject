<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contactMessage) {}

    public function build()
    {
        return $this
            ->subject('Nieuw contactbericht: ' . ($this->contactMessage->subject ?? 'Geen onderwerp'))
            ->view('emails.contact.submitted');
    }
}
