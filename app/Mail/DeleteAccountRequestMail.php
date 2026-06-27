<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DeleteAccountRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $email,
        public readonly string $reason,
    )
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [
                new Address($this->email),
            ],
            subject: 'Account Deletion Request',
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.delete_account_request',
            with: [
                'email' => $this->email,
                'reason' => $this->reason,
            ],
        );
    }

    /**
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
