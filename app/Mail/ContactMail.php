<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $exactContact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($exactContact)
    {
        //
        $this->exactContact = $exactContact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contactmail')
                    ->subject('Santona Media Reader Mail')
                    ->with([
                            'name'=>$this->exactContact->name,
                            'email'=>$this->exactContact->email,
                            'subject'=>$this->exactContact->subject,
                            'message'=>$this->exactContact->message,
                            ]);
    }
}
