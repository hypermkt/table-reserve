<?php

namespace App\Repositories;

use App\DataAccess\Eloquent\Customer;
use App\DataAccess\Eloquent\Reservation;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function store(array $data, Customer $customer)
    {
        return Reservation::create([
            'restaurant_id' => $data['restaurant_id'],
            'customer_id' => $customer->id,
            'course_id' => $data['course_id'],
            'number_of_people' => $data['number_of_people'],
            'datetime' => $data['datetime'],
        ]);
    }

}