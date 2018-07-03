<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'desciption',
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
