<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Webmozart\Assert\Tests\StaticAnalysis\length;

class ComponentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $componentNames = [
            'Camioneta',
            'Tractocamion',
            'Convertidor',
            'Unitario Plataforma',
            'Unitario Tolva',
            'Unitario Volteo',
            'Unitario Tanque',
            'Remolque Plataforma',
            'Remolque Tolva',
            'Remolque Volteo',
            'Remolque Tanque',
            'Remolque Movil',
        ];
        foreach ($componentNames as $componentName) {
            if ($componentName == "Camioneta" || $componentName == "Tractocamion" || $componentName == "Unitario Plataforma" ||
                $componentName == "Unitario Tolva" || $componentName == "Unitario Volteo" || $componentName == "Unitario Tanque") {
                    $component = Component::create([
                        'component' => $componentName,
                        'motor' => 1
                    ]);
            } else {
                $component = Component::create([
                    'component' => $componentName,
                    'motor' => 0
                ]);
            }

        }
        $configurations = Configuration::all();
        foreach ($configurations as $configuration) {
            $randomNumber = rand(1, 4);
            $components = Component::inRandomOrder()->take($randomNumber)->get();
            foreach ($components as $index => $component) {
                $order = $index + 1;
                $configuration->components()->attach($component->id, ['order' => $order]);
            }
        }
    }
}
