<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
        'number_of_passengers',
        'grand_total',
        'booking_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
