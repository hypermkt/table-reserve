<?php

namespace App\DataAccess\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['user_id', 'table_type_id', 'accept_date', 'acceptable_table_number'];

    public function tableType()
    {
        return $this->belongsTo(TableType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
