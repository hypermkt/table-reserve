<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

class ReservationController extends Controller
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index($username)
    {
        $restaurant = $this->userRepository->getByName($username)->restaurant;

        return view('reservations.index', [
            'username' => $username,
            'restaurant' => $restaurant,
        ]);
    }
}
