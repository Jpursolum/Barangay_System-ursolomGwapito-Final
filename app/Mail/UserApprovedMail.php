<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Declare the property

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     */
    public function __construct($user)
    {
        $this->user = $user; // Assign the user object to the property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Account Has Been Approved')
            ->view('emails.user-approved') // Email template
            ->with([
                'user' => $this->user, // Pass the user to the view
            ]);
    }
}
