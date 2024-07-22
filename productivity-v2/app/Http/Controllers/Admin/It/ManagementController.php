<?php

namespace App\Http\Controllers\Admin\It;

use App\Http\Controllers\Controller;
use App\Models\BklManagement;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index($id)
    {
        $Managements = BklManagement::where('bkl_area_id', $id)->orderBy('name', 'asc')->get();
        return response()->json($Managements, 200);
    }
}
