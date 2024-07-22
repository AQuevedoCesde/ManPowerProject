<?php

namespace Database\Seeders;

use App\Models\BklArea;
use Illuminate\Database\Seeder;

class BklAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = array(
            "Finanzas",
            "Operaciones",
            "Core",
            "Experiencia Clientes",
            "It",
            "Comercial",
            "Juridica",
        );

        foreach ($areas as $key => $area) {
            BklArea::create([
                'name' => $area
            ]);
        }
    }
}
