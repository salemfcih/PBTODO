<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $casts = [
        'availability' => 'array'
    ];

    protected $fillable = [
        'name', 'price', 'city', 'availability'
    ];
}
