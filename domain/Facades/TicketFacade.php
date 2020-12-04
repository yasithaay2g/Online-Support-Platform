<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;


class TicketFacade extends Facade
{


    protected static function getFacadeAccessor()
    {
        return 'domain\Ticket\TicketService';
    }
}