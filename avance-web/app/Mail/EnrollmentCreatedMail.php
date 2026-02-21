<?php

namespace App\Mail;

use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnrollmentCreatedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Enrollment $enrollment)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva inscripción de ' . $this->labelType(),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enrollments.created',
            with: [
                'enrollment' => $this->enrollment,
                'typeLabel' => $this->labelType(),
            ],
        );
    }

    private function labelType(): string
    {
        return $this->enrollment->type === Enrollment::TYPE_LEADER ? 'líder' : 'estudiante';
    }
}
