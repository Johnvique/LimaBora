<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farms extends Model
{
    //
    protected $fillable=[
        'name',
        'location',
        'products',
        'owner',
        'farming_system',
        'reports',
        'image',
        
    ];
}
