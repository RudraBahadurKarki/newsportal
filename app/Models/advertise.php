<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class advertise extends Model
{
    protected $fillable = [
        'company_name',
        'contact_no',
        'expire_date',
        'banner',
        'redirect_link',
    ];

    protected $casts =[
        'expire_date' => 'date',
    ];
}


