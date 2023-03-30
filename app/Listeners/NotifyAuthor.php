<?php

namespace App\Listeners;

use App\Mail\NotifyAuthorMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAuthor
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        
      switch ($event->question->questionable_type) {
        case 'App\Models\Post':
            $post=$event->question->questionable;
            $author=$post->user;
            Mail::to($author->email)->send(new NotifyAuthorMailable($event->question,$author));
            break;
        
       
      }
    }
}
