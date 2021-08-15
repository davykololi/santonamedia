<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\User;
use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyPostCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        // Access the post using $event->post....
        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send('emails.post.created',$event->post);
        }
    }
}
