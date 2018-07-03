<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'tour_id',
        'content',
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commented');
    }
}
