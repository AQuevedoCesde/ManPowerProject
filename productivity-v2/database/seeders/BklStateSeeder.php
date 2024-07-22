<?php

namespace Database\Seeders;

use App\Models\BklState;
use Illuminate\Database\Seeder;

class BklStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = array(
            'En proceso',
            'Finalizado',
            'Suspendido',
            'Pendiente',
            'En fabrica',
            'Cancelado',
        );

        foreach($states as $key => $state){
            BklState::create([
            'name' => $state
        ]);
        }
        
    }
}
