<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Administrador'],
            ['name' => 'reclutador', 'display_name' => 'Reclutador'],
            ['name' => 'aprobador', 'display_name' => 'Aprobador']
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}
