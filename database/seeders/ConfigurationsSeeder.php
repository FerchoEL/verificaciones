<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::create(['vehicle_id' => '1','type_id' => '1' ]); //Camioneta Camioneta

        Configuration::create(['vehicle_id' => '2','type_id' => '2' ]); //Rabon Plataforma
        Configuration::create(['vehicle_id' => '2','type_id' => '3' ]); //Rabon Volteo
        Configuration::create(['vehicle_id' => '2','type_id' => '4' ]); //Rabon Tanque
        Configuration::create(['vehicle_id' => '2','type_id' => '5' ]); //Rabon Tolva
        Configuration::create(['vehicle_id' => '2','type_id' => '6' ]); //Rabon Movil

        Configuration::create(['vehicle_id' => '3','type_id' => '2' ]); //Torton Plataforma
        Configuration::create(['vehicle_id' => '3','type_id' => '3' ]); //Torton Volteo
        Configuration::create(['vehicle_id' => '3','type_id' => '4' ]); //Torton Tanque
        Configuration::create(['vehicle_id' => '3','type_id' => '5' ]); //Torton Tolva
        Configuration::create(['vehicle_id' => '3','type_id' => '6' ]); //Torton Movil

        Configuration::create(['vehicle_id' => '4','type_id' => '2' ]); //Trailer Plataforma
        Configuration::create(['vehicle_id' => '4','type_id' => '3' ]); //Trailer Volteo
        Configuration::create(['vehicle_id' => '4','type_id' => '4' ]); //Trailer Tanque
        Configuration::create(['vehicle_id' => '4','type_id' => '5' ]); //Trailer Tolva
        Configuration::create(['vehicle_id' => '4','type_id' => '6' ]); //Trailer Movil

        Configuration::create(['vehicle_id' => '5','type_id' => '2' ]); //Full Plataforma
        Configuration::create(['vehicle_id' => '5','type_id' => '3' ]); //Full Volteo
        Configuration::create(['vehicle_id' => '5','type_id' => '4' ]); //Full Tanque
        Configuration::create(['vehicle_id' => '5','type_id' => '5' ]); //Full Tolva
        Configuration::create(['vehicle_id' => '5','type_id' => '6' ]); //Full Movil

    }
}
