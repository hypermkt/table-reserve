<?php

namespace App\Repositories;

interface TableTypeInterface
{
    public function store(array $data, $restaurantId, $userId);
    public function update(array $data, $tableTypeId);
}