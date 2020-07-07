<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageDetails)
    {
        $this->message = $messageDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {       
        $this->message = array($this->message);
        
        return $this->markdown('delete.name')
                    ->subject('From Portfolio.. SomeOne Send Message...')
                    ->with('details', $this->message);

    }
}
