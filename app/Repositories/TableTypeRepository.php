<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\TableType;


class TableTypeRepository implements TableTypeInterface
{
    public function store(array $data, $restaurantId, $userId)
    {
        return TableType::create([
            'restaurant_id' => $restaurantId,
            'user_id' => $userId,
            'release_state' => $data['release_state'],
            'table_type_name' => $data['table_type_name'],
            'available_start_time' => $data['available_start_time'],
            'available_end_time' => $data['available_end_time'],
            'minimum_capacity' => $data['minimum_capacity'],
            'max_capacity' => $data['max_capacity'],
            'number_of_sales' => $data['number_of_sales'],
            'connectable' => $data['connectable'],
        ]);
    }

    public function update(array $data, TableType $tableType)
    {
        $tableType->release_state = $data['release_state'];
        $tableType->table_type_name = $data['table_type_name'];
        $tableType->available_start_time = $data['available_start_time'];
        $tableType->available_end_time = $data['available_end_time'];
        $tableType->minimum_capacity = $data['minimum_capacity'];
        $tableType->max_capacity = $data['max_capacity'];
        $tableType->number_of_sales = $data['number_of_sales'];
        $tableType->connectable = $data['connectable'];
        $tableType->save();
    }
}