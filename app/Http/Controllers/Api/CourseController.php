<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index($pageId)
    {
        $courses = DB::table('pages')
            ->join('users', 'pages.user_id', '=', 'users.id')
            ->join('courses', 'users.id', '=', 'courses.user_id')
            ->where('pages.id', $pageId)
            ->where('pages.release_state', 'public')
            ->where('courses.release_state', 'public')
            ->select('courses.*')
            ->get();

        return response()->json(['courses' => $courses]);
    }
}
