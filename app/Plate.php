<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Plate extends Model implements Searchable
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function getSearchResult(): SearchResult
    {
        

        return new SearchResult(
            $this,
            $this->license_plate,
         );
    }


}
