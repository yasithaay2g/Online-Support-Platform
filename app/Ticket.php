<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name',
        'email',
        'pro_description',
        'phone',
        'ref_no',
        'status',

    ];

    public function change($id)
    {
        $this->where('id', $id)->update(['status' => 1]);
    }
}