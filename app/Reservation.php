<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function page()
    {
        return $this->belongsTo('App\Page');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
