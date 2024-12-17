<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use MongoDB\Client;

class Carslist extends Controller
{
    public function carslist() {
        $list = Cars::all();
        $req = ["Year", "Brand", "Model", "SubModel", "Version", "Doors", "Color", "Traction", "CubicCapacity", "Power", "Gearbox", "Fuel", "Segment", "ColorType", "Class", "Plate"];
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
            'SubModel'=>$request["SubModel"],
            'Version'=>$request["Version"],
            'Doors'=>$request["Doors"],
            'Color'=>$request["Color"],
            'Traction'=>$request["Traction"],
            'CubicCapacity'=>$request["CubicCapacity"],
            'Power'=>$request["Power"],
            'Gearbox'=>$request["Gearbox"],
            'Fuel'=>$request["Fuel"],
            'Segment'=>$request["Segment"],
            'ColorType'=>$request["ColorType"],
            'Class'=>$request["Class"],
            'Plate'=>$request["Plate"]
        ]);
        
        return redirect()->route('cars.list');
    }
    public function carsPage($Plate)
    {
        $car = Cars::where('Plate', $Plate)->first();

        if (!$car) {
            return redirect()->route('cars.list')->with('error', 'Car not found.');
        }

        $client = new Client("mongodb://127.0.0.1:27017");
        $collection = $client->maintenanceDB->maintenancedbs;

        $maintenances = $collection->find(['Plate' => $Plate])->toArray();

        $specs = [
            "Year", "Brand", "Model", "SubModel", "Version", "Doors", 
            "Color", "Traction", "CubicCapacity", "Power", "Gearbox", 
            "Fuel", "Segment", "ColorType", "Class", "Plate"
        ];

        return view('carsPage', [
            'carsSpecs' => $car,
            'specs' => $specs,
            'maintenances' => $maintenances
        ]);
    }
    public function carsMaintenance($Plate)
    {
        $car = Cars::where('Plate', $Plate)->first();

        if (!$car) {
            return redirect()->route('cars.list')->with('error', 'Car not found.');
        }

        $client = new Client("mongodb://127.0.0.1:27017");
        $collection = $client->maintenanceDB->maintenancedbs;

        $maintenances = $collection->find(['Plate' => $Plate])->toArray();

        return view('carsPage', [
            'carsSpecs' => $car,
            'maintenances' => $maintenances
        ]);
    }
}
