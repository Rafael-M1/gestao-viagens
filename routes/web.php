<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //-- Breeze Routes --
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //-- Breeze Routes --

    //-- Admin Routes --
    Route::middleware(["role:Admin"])->group(function () {
        Route::resource('vehicles', VehicleController::class)->except(['show']);
        Route::get('/vehicles/pdf', [VehicleController::class, 'exportPdf'])->name('vehicles.pdf');
        Route::resource('brands', BrandController::class)->except(['show']);
        Route::resource('vehicle-models', VehicleModelController::class)->except(['show']);
    });
    //-- Admin Routes --
});

require __DIR__.'/auth.php';
