<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'release_state'];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function tableTypes()
    {
        return $this->hasMany('App\TableType');
    }
}
