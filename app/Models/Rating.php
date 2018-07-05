<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
        'value',
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
