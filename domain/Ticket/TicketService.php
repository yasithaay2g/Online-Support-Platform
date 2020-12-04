<?php

namespace domain\Ticket;

use App\Events\TicketDetailsEvent;
use App\Events\TicketReplayEvent;
use App\ReplyMessage;
use App\Ticket;
use Illuminate\Support\Str;

class TicketService
{
    protected $ticket;
    protected $reply;

    public function __construct()
    {
        $this->ticket = new Ticket();
        $this->reply = new ReplyMessage();

    }

    public function openAll()
    {
        return $this->ticket->where('status', 1)->get();
    }

    public function all()
    {
        return $this->ticket->get();
    }

    public function getTicket($id)
    {
        return $this->ticket->find($id);
    }

    public function changeStatus($id)
    {
        return $this->ticket->change($id);
    }

    public function makeall($data)
    {

        $nubRow = str::random(6);
        $data['ref_no'] = 'C' . '' . date('Y') . '' . $nubRow;
        $tickets = $this->ticket->create($data);
        event(new TicketDetailsEvent($tickets));
        return $tickets;
    }

    public function makeReply($request)
    {

        $ticket = $this->getTicket($request->ticket_id)->first();
        $data = $request->all();
        $reply = $this->reply->create($data);
        event(new TicketReplayEvent($reply, $ticket));
        return $reply;
    }

}