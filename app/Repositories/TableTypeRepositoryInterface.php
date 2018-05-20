<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\TableType;

interface TableTypeRepositoryInterface
{
    public function store(array $data, $restaurantId, $userId);
    public function update(array $data, TableType $tableType);
}