<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;

class Carslist extends Controller
{
    public function carslist() {
        $list = Cars::all();
        $req = ["Year", "Brand", "Model", "Sub-Model", "Version", "Doors", "Color", "Traction", "Cubic-Capacity", "Power", "Gearbox", "Fuel", "Segment", "Color-Type", "Class", "Plate"];
        return view('homepage', ['carsList' => $list,'req' => $req]);
    }
    public function carsCreate(Request $request) {
        $request->validate([
            'Plate' => 'required|unique:cars',
        ]);

        Cars::create([
            'Year'=>$request["Year"],
            'Brand'=>$request["Brand"],
            'Model'=>$request["Model"],
            'Sub-Model'=>$request["Sub-Model"],
            'Version'=>$request["Version"],
            'Doors'=>$request["Doors"],
            'Color'=>$request["Color"],
            'Traction'=>$request["Traction"],
            'Cubic-Capacity'=>$request["Cubic-Capacity"],
            'Power'=>$request["Power"],
            'Gearbox'=>$request["Gearbox"],
            'Fuel'=>$request["Fuel"],
            'Segment'=>$request["Segment"],
            'Color-Type'=>$request["Color-Type"],
            'Class'=>$request["Class"],
            'Plate'=>$request["Plate"]
        ]);
        
        return redirect()->route('cars.list');
    }
    public function carsPage(Request $request){
        
        $car = Cars::where('Plate', $request['Plate'])->first();

        $specs = ["Year", "Brand", "Model", "Sub-Model", "Version", "Doors", "Color", "Traction", "Cubic-Capacity", "Power", "Gearbox", "Fuel", "Segment", "Color-Type", "Class", "Plate"];

        return view('carsPage', ['carsSpecs' => $car, 'specs' => $specs]);
    }
}
