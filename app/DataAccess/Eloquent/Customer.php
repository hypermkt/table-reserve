<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'tel'];

    public function reservations()
    {
        return $this->hasMany('App\DataAccess\Eloquent\Reservation');
    }
}
