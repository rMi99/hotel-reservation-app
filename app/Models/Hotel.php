<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'star_rating',
        'images',
        'website',
        'active',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
