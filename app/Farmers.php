<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers extends Model
{
    //
    protected $fillable =[
        'username',
        'phone',
        'location',
        'ID_No',
        'picture',
        'gender',
        'email'
    ];
}
