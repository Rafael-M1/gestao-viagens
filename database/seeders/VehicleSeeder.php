<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::insert([
            ['brand' => 'Toyota', 'model' => 'Corolla', 'year' => 2021],
            ['brand' => 'Honda', 'model' => 'Civic', 'year' => 2020],
            ['brand' => 'Ford', 'model' => 'Ranger', 'year' => 2019],
            ['brand' => 'Volkswagen', 'model' => 'T-Cross', 'year' => 2023],
            ['brand' => 'Chevrolet', 'model' => 'Onix', 'year' => 2022],
        ]);
    }
}
