<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Direction::create([
            'name' => 'Centro',
        ]);
        Direction::create([
            'name' => 'Noreste',
        ]);
        Direction::create([
            'name' => 'Sureste',
        ]);
        Direction::create([
            'name' => 'Pacifico',
        ]);
        Direction::create([
            'name' => 'Alliera',
        ]);
    }
}
