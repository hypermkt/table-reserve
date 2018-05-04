<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id', 'release_state', 'kind', 'title', 'price', 'duration_minutes'];

    public function tableTypes()
    {
        return $this->belongsToMany('App\TableType');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
