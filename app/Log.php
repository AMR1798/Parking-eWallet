<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function plates()
    {
        return $this->belongsTo('App\Plate');
    }
}
