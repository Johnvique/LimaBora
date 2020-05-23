<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    //
    protected $fillable =[
        'name',
        'scientific_name',
        'classification',
        'source',
        'family',
        'price',
        'benefits',
        'image'
    ];
}
