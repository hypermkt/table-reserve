<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\TableType;
use App\Http\Requests\TableTypeRequest;

class TableTypeRepository implements TableTypeInterface
{
    public function store(TableTypeRequest $request, $restaurantId, $userId)
    {
        return TableType::create([
            'restaurant_id' => $restaurantId,
            'user_id' => $userId,
            'release_state' => $request->release_state,
            'table_type_name' => $request->table_type_name,
            'available_start_time' => $request->available_start_time,
            'available_end_time' => $request->available_end_time,
            'minimum_capacity' => $request->minimum_capacity,
            'max_capacity' => $request->max_capacity,
            'number_of_sales' => $request->number_of_sales,
            'connectable' => $request->connectable,
        ]);
    }

    public function update(TableTypeRequest $request, $tableTypeId)
    {
        $tableType = TableType::find($tableTypeId);
        $tableType->release_state = $request->release_state;
        $tableType->table_type_name = $request->table_type_name;
        $tableType->available_start_time = $request->available_start_time;
        $tableType->available_end_time = $request->available_end_time;
        $tableType->minimum_capacity = $request->minimum_capacity;
        $tableType->max_capacity = $request->max_capacity;
        $tableType->number_of_sales = $request->number_of_sales;
        $tableType->connectable = $request->connectable;
        $tableType->save();
    }
}