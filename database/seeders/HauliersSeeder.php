<?php

namespace Database\Seeders;

use App\Models\Entity;
use App\Models\Haulier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HauliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hauliers = Haulier::all();
        $entity = Entity::pluck('id');

        foreach ($hauliers as $haulier){
            $haulier->update(['entity_id' => $entity->random()]);
        }
    }
}
