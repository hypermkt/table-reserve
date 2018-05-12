<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\DataAccess\Eloquent\Customer;
use App\DataAccess\Eloquent\Reservation;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $customer = $this->findOrCreate($request);
        $reservation = Reservation::create([
            'restaurant_id' => $request->restaurant_id,
            'customer_id' => $customer->id,
            'course_id' => $request->course_id,
            'number_of_people' => $request->number_of_people,
            'datetime' => $request->datetime,
        ]);

        return response()->json([
            'customer' => $customer,
            'reservation' => $reservation
        ], 201);
    }

    protected function findOrCreate(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if ($customer) {
            return $customer;
        }

        return Customer::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
        ]);
    }
}
