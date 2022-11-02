<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DailyReportMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $numbers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
    }

    /**
     * Create a new message instance.
     *
     * @return DailyReportMail
     */
    public function build()
    {
        return $this->markdown('mail.admin.report');
    }
}
