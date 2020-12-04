<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    protected $fillable = [
        'message',
        'ticket_id'
        

    ];
}