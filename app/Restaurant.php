<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'release_state'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function tableTypes()
    {
        return $this->hasMany('App\TableType');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
