<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'tel'];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}
