<?php

namespace App\Mail;

use App\Models\AssetAssignment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssetAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public AssetAssignment $assignment;

    /**
     * Create a new message instance.
     */
    public function __construct(AssetAssignment $assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Asset Assignment',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.asset-assigned',
            with: [
                'assignment' => $this->assignment,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
