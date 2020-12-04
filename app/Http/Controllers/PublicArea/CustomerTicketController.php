<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use domain\Facades\TicketFacade;
use Illuminate\Http\Request;

class CustomerTicketController extends Controller
{

    public function index()
    {

        $response['tickets'] = TicketFacade::openAll();
        return view('PublicArea.pages.CustomerTicket.all')->with($response);
    }

    public function store(Request $request)
    {

        TicketFacade::make($request->all());
        return redirect()->back()->with('success', 'Create successfully');
    }
}