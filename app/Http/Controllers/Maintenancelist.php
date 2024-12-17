<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use MongoDB\Client;

class Maintenancelist extends Controller
{
    public function listMaintenances()
    {
        $client = new Client("mongodb://127.0.0.1:27017");
        $collection = $client->maintenanceDB->maintenancedbs;
        $data = $collection->find()->toArray();

        return view('maintenances', ['data' => $data]);
    }

    public function store(Request $request, $Plate)
    {
        $validatedData = $request->validate([
            'Plate' => 'required|string',
            'Worker' => 'required|string',
            'Description' => 'required|string|max:255',
            'Date' => 'required|date',
        ]);

        $client = new Client("mongodb://127.0.0.1:27017");
        $collection = $client->maintenanceDB->maintenancedbs;

        $collection->insertOne([
            'Plate' => $Plate,
            'Worker' => $validatedData['Worker'],
            'Description' => $validatedData['Description'],
            'Date' => $validatedData['Date'],
        ]);

        return redirect()->back()->with('success', 'Maintenance record added successfully!');
    }
}
