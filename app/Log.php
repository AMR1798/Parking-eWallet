<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function plate()
    {
        return $this->belongsTo('App\Plate');
    }
}
