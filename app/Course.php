<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['release_state', 'kind', 'title', 'price', 'duration_minutes'];

    public function tableTypes()
    {
        return $this->belongsToMany('App\TableType');
    }
}
