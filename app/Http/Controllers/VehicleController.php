<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        Vehicle::create($request->validate([
            'brand' => 'required',
            'model' => 'required',
            'year'  => 'required|integer',
        ]));

        return redirect()->route('vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->validate([
            'brand' => 'required',
            'model' => 'required',
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
        $vehicles = Vehicle::all();

        $pdf = Pdf::loadView('vehicles.pdf', compact('vehicles'));
        return $pdf->download('veiculos.pdf');
    }
}
