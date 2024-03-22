<?php

namespace Database\Seeders;

use App\Models\CatalogSpecialFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSpecialFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            'Flecha transversal',
            'Flecha corta',
            'Fecha transversal con doble chumacera',
            'Flecha transversal chumacera sencilla',
            'Pernos',
        ];

        $categories = [
            'Flecha soporte de pistón de levante',
            'Flecha soporte de pistón de levante',
            'Sistema de bisagra de góndola',
            'Sistema de bisagra de góndola',
            'Sistema de bisagra de góndola',
        ];
        for ($i=0;$i<5;$i++){
            $field = $fields[$i];
            $category = $categories[$i];
            $catalogspecialfeature = CatalogSpecialFeature::create([
                'field' => $field,
                'category' => $category
            ]);

        }
    }
}
