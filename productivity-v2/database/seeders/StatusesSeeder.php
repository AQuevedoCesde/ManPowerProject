<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Pendiente',
            'Rechazada',
            'Aprobado',
            'Activo',
            'Inactivo',
        ];

        foreach ($statuses as $key => $status) {
            Status::create([
                'name' => $status
            ]);
        }
    }
}
