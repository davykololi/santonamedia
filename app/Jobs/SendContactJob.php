<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contact;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $contact = $this->contact;
        $address = 'kololimdavid@gmail.com';
        Mail::to($address)->send(new ContactMail($contact));
    }
}
