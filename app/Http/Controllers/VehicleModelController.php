<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    public function index()
    {
        $models = VehicleModel::with('brand')->get();
        return view('vehicle_models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('vehicle_models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name'     => 'required|string',
            'year'     => 'required|integer',
        ]);

        VehicleModel::create($request->all());
        return redirect()->route('vehicle-models.index');
    }

    public function edit(VehicleModel $vehicleModel)
    {
        $brands = Brand::all();
        return view('vehicle_models.edit', compact('vehicleModel', 'brands'));
    }

    public function update(Request $request, VehicleModel $vehicleModel)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name'     => 'required|string',
            'year'     => 'required|integer',
        ]);

        $vehicleModel->update($request->all());
        return redirect()->route('vehicle-models.index');
    }

    public function destroy(VehicleModel $vehicleModel)
    {
        $vehicleModel->delete();
        return redirect()->route('vehicle-models.index');
    }
}
