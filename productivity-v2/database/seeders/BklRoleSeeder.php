<?php

namespace Database\Seeders;

use App\Models\BklRole;
use Illuminate\Database\Seeder;

class BklRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            "Front",
            "Middle",
            "Back",
            "It"
        );

        foreach($roles as $key => $rol){
            BklRole::create([
                'name' => $rol
            ]);
        }
    }
}
