<?php

namespace App\DataAccess\Eloquent;

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
        return $this->hasMany(TableType::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}
