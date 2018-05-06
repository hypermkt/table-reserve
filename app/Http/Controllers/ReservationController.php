<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index($username)
    {
        return view('reservations.index', [
            'username' => $username,
        ]);
    }
}
