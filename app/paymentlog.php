<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentlog extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
