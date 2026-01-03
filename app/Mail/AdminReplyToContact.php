<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminReplyToContact extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactMessage $contactMessage,
        public string $replyText
    ) {}

    public function build()
    {
        return $this
            ->subject('Antwoord op jouw bericht: ' . ($this->contactMessage->subject ?? ''))
            ->view('emails.contact.reply');
    }
}
