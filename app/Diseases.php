<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    //
    protected $fillable=[
        'name',
        'category',
        'causes',
        'signs',
        'plants_attacked',
        'remedy'
    ];
}
