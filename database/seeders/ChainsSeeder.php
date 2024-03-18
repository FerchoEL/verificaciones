<?php

namespace Database\Seeders;

use App\Models\Chain;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chainNames = [
            'Agregados',
            'Granel',
            'Materia',
            'Aditivos',
            'Sacos',
            'Contenedores',
            'Firsu',
            'Construrama',
            'Promexa',
            'Soluciones Urbanas',
        ];
        foreach ($chainNames as $chainName) {
            $chain = Chain::create(['name' => $chainName]);
            $locations = Location::inRandomOrder()->take(5)->get();
            $chain->locations()->attach($locations->pluck('id'));
        }
    }
}
