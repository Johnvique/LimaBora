<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
    protected $fillable =[
        'username',
        'phone',
        'location',
        'ID_No',
        'gender',
        'email',
        'image'
        
    ];
}
