<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_model_id' => VehicleModel::inRandomOrder()->first()?->id ?? VehicleModel::factory(),
            'license_plate' => strtoupper(fake()->bothify('???-####')),
            'year' => fake()->numberBetween(2000, 2025),
        ];
    }
}
