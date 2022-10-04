<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail2 extends Mailable
{
    use Queueable, SerializesModels;
    public $data2;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data2)
    {
        $this->data2 = $data2;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('users.email2')
                    ->subject($this->data2['title'])
                    ->with('data', $this->data2);
    }
}