<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\RestaurantRequest;
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

    public function update(RestaurantRequest $request, $id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->release_state = $request->release_state;
        $restaurant->save();

        return response()->json($restaurant);
    }
}
