<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TableType extends Model
{
    protected $fillable = ['restaurant_id', 'user_id', 'release_state', 'table_type_name', 'available_start_time', 'available_end_time', 'minimum_capacity', 'max_capacity', 'number_of_sales', 'connectable'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
