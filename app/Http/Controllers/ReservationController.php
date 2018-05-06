<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReservationController extends Controller
{
    public function index($username)
    {
        $restaurant = User::where('name', $username)->first()->restaurant;
        return view('reservations.index', [
            'username' => $username,
            'restaurant' => $restaurant,
        ]);
    }
}
