<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['restaurant_id', 'customer_id', 'course_id', 'number_of_people', 'datetime'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
