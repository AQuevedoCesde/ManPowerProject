<?php

namespace Database\Seeders;

use App\Models\BklPriority;
use Illuminate\Database\Seeder;

class BklPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priorities = array(
            "alta",
            "media",
            "baja",
        );

        foreach( $priorities as $key => $priority){
            BklPriority::create([
                'name' => $priority
            ]);
        }
    }
}
