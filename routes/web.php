<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vehicles', VehicleController::class)->except(['show']);
Route::get('/vehicles/pdf', [VehicleController::class, 'exportPdf'])->name('vehicles.pdf');
Route::resource('brands', BrandController::class)->except(['show']);
Route::resource('vehicle-models', VehicleModelController::class)->except(['show']);
