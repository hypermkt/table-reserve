<?php

namespace App\Http\Controllers\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('reservations.books.index');
    }
}
