<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'handle', 'twitter_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tableTypes()
    {
        return $this->hasMany('App\TableType');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }
}
