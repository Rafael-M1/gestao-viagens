<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('vehicleModel.brand')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $vehicleModels = VehicleModel::with('brand')->get();
        return view('vehicles.create', compact('vehicleModels'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'license_plate' => 'required|string|max:10|unique:vehicles,license_plate',
            'year'  => 'required|integer',
        ]);

        Vehicle::create($validatedData);
        return redirect()->route('vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicleModels = VehicleModel::with('brand')->get();
        return view('vehicles.edit', compact('vehicle', 'vehicleModels'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validate([
            'vehicle_model_id' => 'required|exists:vehicle_models,id',
            'license_plate' => 'required|string|max:10|unique:vehicles,license_plate,' . $vehicle->id,
            'year'  => 'required|integer',
        ]));

        return redirect()->route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index');
    }

    public function exportPdf()
    {
        $vehicles = Vehicle::with('vehicleModel.brand')->get();

        $pdf = Pdf::loadView('vehicles.pdf', compact('vehicles'));
        return $pdf->download('veiculos.pdf');
    }
}
