<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['restaurant_id', 'customer_id', 'course_id', 'number_of_people', 'datetime'];

    public function restaurant()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\Restaurant');
    }

    public function customer()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\Customer');
    }

    public function course()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\Course');
    }
}
