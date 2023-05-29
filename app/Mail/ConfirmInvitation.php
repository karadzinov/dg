<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message = '';
    public $subject = '';

    public function __construct($message)
    {
        $this->message = $message;
        $this->subject = 'Ви благодариме за потврдата!';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('martin@myhost.mk')
            ->with($this->message)
            ->subject($this->subject)
            ->markdown('vendor.mail.html.message');
    }
}
