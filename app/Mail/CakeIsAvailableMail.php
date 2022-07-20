<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CakeIsAvailableMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cake;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $cake)
    {
        $this->cake = $cake;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bolos_do_rafael@bolo.com', 'Bolos do Rafael')
            ->view('email.cakes');
    }
}