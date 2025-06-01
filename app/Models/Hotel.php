<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'star_rating',
        'images',
        'website',
        'active',
        'charge',
    ];

    protected $casts = [
        'active' => 'boolean',
        'star_rating' => 'integer',
    ];
}


// Migration for SHould Add Address