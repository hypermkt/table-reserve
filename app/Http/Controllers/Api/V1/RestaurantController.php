<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataAccess\Eloquent\Restaurant;

class RestaurantController extends Controller
{
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return response()->json($restaurant);
    }
}
