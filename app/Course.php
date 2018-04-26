<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function tableTypes()
    {
        return $this->belongsToMany('App\TableType');
    }
}
