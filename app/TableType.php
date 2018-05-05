<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableType extends Model
{
    protected $fillable = ['restaurant_id', 'user_id', 'release_state', 'title', 'start_time', 'end_time', 'minimum_capacity', 'max_capacity', 'number_of_sales', 'connectable'];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
}
