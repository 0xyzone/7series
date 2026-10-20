<?php

namespace App\Mail;

use App\Models\WholesaleInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public WholesaleInquiry $inquiry;
    public string $referenceId;
    public string $type;

    /**
     * Create a new message instance.
     */
    public function __construct(WholesaleInquiry $inquiry, string $referenceId, string $type = 'Contact Message')
    {
        $this->inquiry = $inquiry;
        $this->referenceId = $referenceId;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('samparka@7series.com.np', 'Seven Series Denim'),
            replyTo: [
                new Address('samparka@7series.com.np', 'Seven Series Factory Desk'),
            ],
            subject: "Seven Series | Inquiry Received & Reference ID: {$this->referenceId}",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-confirmation',
            with: [
                'inquiry' => $this->inquiry,
                'referenceId' => $this->referenceId,
                'type' => $this->type,
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
