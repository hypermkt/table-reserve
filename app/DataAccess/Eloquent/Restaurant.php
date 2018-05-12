<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'release_state'];

    public function user()
    {
        return $this->hasOne('App\DataAccess\Eloquent\User');
    }

    public function tableTypes()
    {
        return $this->hasMany('App\DataAccess\Eloquent\TableType');
    }

    public function reservations()
    {
        return $this->hasMany('App\DataAccess\Eloquent\Reservation');
    }
}
