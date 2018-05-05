<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Page;

class ReservationController extends Controller
{
    public function index($username, $pageId)
    {
        $courses = DB::table('pages')
            ->join('users', 'pages.user_id', '=', 'users.id')
            ->join('courses', 'users.id', '=', 'courses.user_id')
            ->where('pages.id', $pageId)
            ->where('pages.release_state', 'public')
            ->where('courses.release_state', 'public')
            ->select('courses.*')
            ->get();

        return view('reservations.index', [
            'courses' => $courses,
            'username' => $username,
            'pageId' => $pageId,
        ]);
    }

    public function show(Request $id)
    {
        return view('reservations.show');
    }
}
