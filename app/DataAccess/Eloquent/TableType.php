<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TableType extends Model
{
    protected $fillable = ['restaurant_id', 'user_id', 'release_state', 'table_type_name', 'available_start_time', 'available_end_time', 'minimum_capacity', 'max_capacity', 'number_of_sales', 'connectable'];

    public function courses()
    {
        return $this->belongsToMany('App\DataAccess\Eloquent\Course');
    }

    public function stocks()
    {
        return $this->hasMany('App\DataAccess\Eloquent\Stock');
    }

    public function user()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\DataAccess\Eloquent\Restaurant');
    }
}
