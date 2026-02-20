<?php

namespace Database\Seeders;

use App\Models\PrincipleStage;
use Illuminate\Database\Seeder;

class PrincipleStageSeeder extends Seeder
{
    public function run(): void
    {
        $stages = [
            ['name' => 'Preparar', 'slug' => 'preparar', 'order' => 1],
            ['name' => 'Sembrar', 'slug' => 'sembrar', 'order' => 2],
            ['name' => 'Cuidar', 'slug' => 'cuidar', 'order' => 3],
            ['name' => 'Servir', 'slug' => 'servicio', 'order' => 4],
            ['name' => 'Cosechar', 'slug' => 'misiones', 'order' => 5],
        ];

        foreach ($stages as $stage) {
            PrincipleStage::updateOrCreate(['slug' => $stage['slug']], $stage);
        }
    }
}
