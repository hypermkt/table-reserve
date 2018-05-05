<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Requests\CourseRequest;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index($pageId)
    {
        return response()->json(
            ['hello' => 'world']
        );
    }
}
