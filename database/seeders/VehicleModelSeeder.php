<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\VehicleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleModelSeeder extends Seeder
{
    public function run(): void
    {
        if (Brand::count() === 0) {
            Brand::factory(5)->create();
        }

        VehicleModel::factory(20)->create();
    }
}
