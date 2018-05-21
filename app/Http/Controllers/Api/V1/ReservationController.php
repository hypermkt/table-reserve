<?php

namespace App\Http\Controllers\Api\V1;

use App\Repositories\ReservationRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataAccess\Eloquent\Customer;

class ReservationController extends Controller
{
    private $reservationRepository;

    public function __construct(
        ReservationRepositoryInterface $reservationRepository
    )
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function store(Request $request)
    {
        $customer = $this->findOrCreate($request);

        return response()->json([
            'customer' => $customer,
            'reservation' => $this->reservationRepository->store($request->all(), $customer)
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
