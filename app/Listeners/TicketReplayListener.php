<?php

namespace App\Listeners;

use App\Events\TicketReplayEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketReplayMail;
class TicketReplayListener
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
     * @param  TicketReplayEvent  $event
     * @return void
     */
    public function handle(TicketReplayEvent $event)
    {
        $data = $event->data;
        $user = $event->user;
  

        Mail::to($user->email)->send(new TicketReplayMail($data,$user));
    }
    
}