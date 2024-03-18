<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         /*\App\Models\User::factory(10)->create();
         \App\Models\User::factory()->create([
             'user' => 'Administrator',
             'email' => 'admin@admin.com',
             'password' => Hash::make('admin123'),
             'name' => 'Admin'
         ]);*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TypesSeeder::class);
        $this->call(VehiclesSeeder::class);
        $this->call(ConfigurationsSeeder::class);
        $this->call(DirectionsSeeder::class);

    }
}
