<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['table_type_id', 'accept_date', 'acceptable_table_number'];

    public function tableType()
    {
        return $this->belongsTo('App\TableType');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
