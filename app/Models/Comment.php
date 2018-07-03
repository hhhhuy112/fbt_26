<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'commented_id',
        'commented_type',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function commented()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commented');
    }
}
