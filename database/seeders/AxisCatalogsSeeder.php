<?php

namespace Database\Seeders;

use App\Models\AxisCatalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AxisCatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $AxisCatalogs = AxisCatalog::Factory(10)->create();
}
}
