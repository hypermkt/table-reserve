<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'release_state'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function tableTypes()
    {
        return $this->hasMany(TableType::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
