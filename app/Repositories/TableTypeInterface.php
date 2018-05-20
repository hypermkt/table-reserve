<?php

namespace App\Repositories;

use App\Http\Requests\TableTypeRequest;

interface TableTypeInterface
{
    public function store(TableTypeRequest $request, $restaurantId, $userId);
}