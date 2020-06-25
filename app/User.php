<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class User extends Authenticatable implements MustVerifyEmail, Searchable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','nric',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plates()
    {
        return $this->hasMany('App\Plate');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function paymentlogs()
    {
        return $this->hasMany('App\paymentlog');
    }

    public function getSearchResult(): SearchResult
    {
        

        return new SearchResult(
            $this,
            $this->name,
         );
    }

    
}
