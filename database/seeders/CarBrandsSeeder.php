<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carBrandsNames = [
            'Toyota',
            'Honda',
            'Ford',
            'Chevrolet',
            'Nissan',
            'Volkswagen',
            'BMW',
            'Mercedes-Benz',
            'Audi',
            'Hyundai',
        ];
        foreach ($carBrandsNames as $carBrandsName){
            $carBrand = CarBrand::create(['brand'=> $carBrandsName]);
            $components = Component::inRandomOrder()->take(5)->get();
            $carBrand->components()->attach($components->pluck('id'));
        }
    }
}
