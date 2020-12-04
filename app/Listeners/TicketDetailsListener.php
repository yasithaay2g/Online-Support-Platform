<?php

namespace App\Listeners;

use App\Events\TicketDetailsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketDetailsMail;
class TicketDetailsListener
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
     * @param  TicketDetailsEvent  $event
     * @return void
     */
    public function handle(TicketDetailsEvent $event)
    {
        $data = $event->data;
  
        $user=$data->email;

        Mail::to($user)->send(new TicketDetailsMail($data));
    }
}