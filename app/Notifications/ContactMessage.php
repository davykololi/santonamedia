<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class ContactMessage extends Notification
{
    use Queueable;
    private $contact;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->line('The Contact Message From Newstadia Reader.')
                    ->content($this->contact->name)
                    ->action('Read More', url('/'))
                    ->line('For the latest exciting and captivating news, newstadia.com is the place to be!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
