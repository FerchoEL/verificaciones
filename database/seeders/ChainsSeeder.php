<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chains = [
            'Agregados',
            'Granel',
            'Materia',
            'Aditivos',
            'Sacos',
            'Contenedores',
            'Firsu',
            'Construrama',
            'Promexma',
            'Soluciones Urbanas'
        ];

        foreach ($chains as $chain) {
            DB::table('chains')->insert([
                'name' => $chain,
            ]);
        }
    }
}
