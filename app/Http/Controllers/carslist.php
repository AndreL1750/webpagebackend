<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cars;

class carslist extends Controller
{
    public function carslist() {
        $list = cars::all();
        $req = ["Year", "Brand", "Model", "Sub-Model", "Version", "Doors", "Color", "Traction", "Cubic-Capacity", "Power", "Gearbox", "Fuel", "Segment", "Color-Type", "Class", "Plate"];
        return view('homepage', ['carsList' => $list,'req' => $req]);
    }
}
