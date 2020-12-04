<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketReplayMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$user)
    {
        $this->data = $data;
        $this->user= $user;
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $response['replys'] = $this->data;
      $response['tickets'] = $this->user;
        return $this->view('Mails.ticketreplay')
            ->subject('Reply for your ticket')
            ->with($response);
    }
}