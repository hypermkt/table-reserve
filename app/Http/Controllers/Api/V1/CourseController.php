<?php

namespace App\Http\Controllers\Api\V1;

use App\DataAccess\Eloquent\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = DB::table('restaurants')
            ->join('users', 'restaurants.user_id', '=', 'users.id')
            ->join('courses', 'users.id', '=', 'courses.user_id')
            ->where('users.name', $request->username)
            ->where('restaurants.release_state', 'public')
            ->where('courses.release_state', 'public')
            ->select('courses.*')
            ->get();

        // コースに紐づく席タイプを詰める
        foreach ($courses as $key => $course) {
            $course = Course::find($course->id);
            $courses[$key]->table_types = $course->tableTypes;
        }

        return response()->json([
            'courses' => $courses
        ]);
    }
}
