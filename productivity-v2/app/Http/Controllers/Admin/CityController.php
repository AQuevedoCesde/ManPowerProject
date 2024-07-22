<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Get all cities by department
     */
    public function index($id)
    {
        $cities = City::where('state_id', $id)->orderBy('name', 'asc')->get();
        return response()->json($cities, 200);
    }
}
