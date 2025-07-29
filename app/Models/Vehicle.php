<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_model_id', 'license_plate', 'year'];

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
