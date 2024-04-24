<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobPostedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Job $job)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Job Posted',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.job-posted',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
