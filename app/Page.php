<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function courses()
    {
        $this->hasMany('App\Course');
    }
}
