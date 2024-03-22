<?php

namespace Database\Seeders;

use App\Models\SupportingFeature;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportingFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $HPs = [
            '430',
            '400',
            '215',
            '195',
            '100',
        ];
        $Torques = [
            '1650',
            '1050',
            '600',
            '450',
            '400',
        ];
        $Capacity = [
            '46000',
            '44000',
            '22000',
        ];
        $vehicles = Vehicle::all()->slice(1);
        foreach ($vehicles as $index => $vehicle){
            $supportingfeature = SupportingFeature::create([
                'vehicle_id' => $vehicle->id,
                'electric_motor' => 'SI',
                'horsepower' => $HPs[$index],
                'torque' => $Torques[$index],
                'traction' => '6x4',
                'capacity' => $Capacity[array_rand($Capacity)],
                'brake' => 'SI',
                'auxiliary' => 'SI',
                'camera' => 'SI',
                'regulator' => 'SI',
                'tape' => 'SI',
            ]);
        }

    }
}
