<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesticides extends Model
{
    //
    protected $fillable = [
        'name',
        'purpose',
        'type',
        'pest_controlled',
        'effects',
        'cost',
        'image',
    ];
}
