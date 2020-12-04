<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use domain\Facades\TicketFacade;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $response['tickets'] = TicketFacade::all();
        return view('AdminArea.pages.Ticket.all')->with($response);
    }

    public function create()
    {
        return view('AdminArea/pages/Ticket/new');
    }

    public function store(Request $request)
    {
        TicketFacade::make($request->all());
        return redirect(route('tickets.all'))->with('success', 'Create successfully');
    }

    public function view($id)
    {
        $response['tickets'] = TicketFacade::getTicket($id);
        TicketFacade::changeStatus($id);
        return view('AdminArea.pages.Ticket.view')->with($response);
    }

    public function replyStore(Request $request)
    {
        TicketFacade::makeReply($request);
        return redirect()->back()->with('success', 'Send successfully');
    }

}