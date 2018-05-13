<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function index()
    {
        return view('settings.generals.index', [
            'restaurant_id' => session('restaurant_id')
        ]);
    }
}
