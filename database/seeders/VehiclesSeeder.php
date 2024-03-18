<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'transport' => 'Camioneta',
            'num_component' => '1',
        ]);
        Vehicle::create([
            'transport' => 'Rabon',
            'num_component' => '1',
        ]);
        Vehicle::create([
            'transport' => 'Torton',
            'num_component' => '1',
        ]);
        Vehicle::create([
            'transport' => 'Trailer',
            'num_component' => '2',
        ]);
        Vehicle::create([
            'transport' => 'Full',
            'num_component' => '4',
        ]);

    }
}
