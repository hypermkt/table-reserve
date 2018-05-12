<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        return view('reservations.calendars.index');
    }
}
