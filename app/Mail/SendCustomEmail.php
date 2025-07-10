<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    public function __construct($emailData)
    {
        $this->emailData = $emailData;
    }

    public function build()
    {
        $email = $this->view('emails.custom_email')
            ->subject($this->emailData['title'])
            ->with(['body' => $this->emailData['body']]);

        // Attach file if present
        if (isset($this->emailData['attachment'])) {
            $email->attach(storage_path('app/'.$this->emailData['attachment']));
        }

        return $email;
    }
}
