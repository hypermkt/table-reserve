<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return view('reservations.index');
    }

    public function show(Request $id)
    {
        return view('reservations.show');
    }
}
