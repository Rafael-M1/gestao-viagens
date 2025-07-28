<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('vehicles', VehicleController::class)->except(['show']);
Route::get('/vehicles/pdf', [VehicleController::class, 'exportPdf'])->name('vehicles.pdf');
