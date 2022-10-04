<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail4 extends Mailable
{
    use Queueable, SerializesModels;
    public $data3;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data3)
    {
        $this->data3 = $data3;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.EmailRespontoUser')
                    ->subject($this->data3['title'])
                    ->with('data', $this->data3);
    }
}
