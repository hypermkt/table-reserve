<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Customer;

interface ReservationRepositoryInterface
{
    public function store(array $data, Customer $customer);
}