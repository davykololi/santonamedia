<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Models\User;
use Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyVideoCreated
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
     * @param  VideoCreated  $event
     * @return void
     */
    public function handle(VideoCreated $event)
    {
        // Access the video using $event->video
        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send('emails.video.created',$event->video);
        }
    }
}
