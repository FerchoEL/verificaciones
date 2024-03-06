<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'type' => 'Camioneta',
        ]);
        Type::create([
            'type' => 'Plataforma',
        ]);
        Type::create([
            'type' => 'Volteo',
        ]);
        Type::create([
            'type' => 'Tanque',
        ]);
        Type::create([
            'type' => 'Tolva',
        ]);
        Type::create([
            'type' => 'Movil',
        ]);
    }
}
