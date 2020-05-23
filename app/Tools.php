<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    //
    protected $fillable = [
        'name',
        'category',
        'operation',
        'mentainance',
        'functions',
        'cost',
        'image',
        
    ];
}
