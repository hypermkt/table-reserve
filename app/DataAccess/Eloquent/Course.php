<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id', 'release_state', 'kind', 'course_name', 'price', 'duration_minutes'];

    public function tableTypes()
    {
        return $this->belongsToMany('App\DataAccess\Eloquent\TableType');
    }

    public function user()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\User');
    }

    public function reservations()
    {
        return $this->hasMany('App\DataAccess\Eloquent\Reservation');
    }
}
