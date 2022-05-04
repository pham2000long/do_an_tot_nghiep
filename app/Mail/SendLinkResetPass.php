<?php

namespace App\Mail;

use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendLinkResetPass extends Mailable
{
    use Queueable, SerializesModels;

    public $passwordReset;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PasswordReset $passwordReset)
    {
        $this->passwordReset = $passwordReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->passwordReset->email)
            ->view('pages.mails.send_reset_password')->with([
                'passwordReset' => $this->passwordReset,
                'frontendSendResetPasswordUrl' => config('const.url') . 'admin' . '/reset-password/'
                    . $this->passwordReset->token,
            ]);
    }
}
