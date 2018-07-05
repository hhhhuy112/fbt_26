<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'itinerary',
        'start_date',
        'price',
        'description',
    ];

    public function packages()
    {
        return $this->hasMany('App\Models\Package');
    }

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function likes()
    {
        return $this->hasManyThrough('App\Models\Like', 'App\Models\Review');
    }

    public function comments()
    {
        return $this->hasManyThrough('App\Models\Comment', 'App\Models\Review');
    }
}
