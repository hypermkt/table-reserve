<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index($username)
    {
        $courses = DB::table('restaurants')
            ->join('users', 'restaurants.user_id', '=', 'users.id')
            ->join('courses', 'users.id', '=', 'courses.user_id')
            ->where('users.name', $username)
            ->where('restaurants.release_state', 'public')
            ->where('courses.release_state', 'public')
            ->select('courses.*')
            ->get();

        return view('reservations.index', [
            'courses' => $courses,
            'username' => $username,
        ]);
    }

    public function show(Request $id)
    {
        return view('reservations.show');
    }
}
