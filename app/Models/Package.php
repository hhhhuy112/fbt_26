<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'desciption',
        'discount',
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Tour');
    }
}
