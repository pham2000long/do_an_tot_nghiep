<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $carts;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $carts, $order)
    {
        $this->user = $user;
        $this->carts = $carts;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('pham2000long@gmail.com')
            ->view('pages.mails.order')->with([
                'carts' => $this->carts,
                'order' => $this->order
            ]);
    }
}
