<?php

namespace Database\Seeders;

use App\Models\BklManagement;
use Illuminate\Database\Seeder;

class BklManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managements = array(
            array("name" => "Ssc", "bkl_area_id" => 1),
            array("name" => "Finanzas", "bkl_area_id" =>1),
            array("name" => "Impuestos", "bkl_area_id" =>1),
            array("name" => "Dirección", "bkl_area_id" =>1),
            array("name" => "Tesoreria", "bkl_area_id" =>1),
            array("name" => "Cartera", "bkl_area_id" =>1),
            array("name" => "Facturación", "bkl_area_id" =>1),
            array("name" => "Operaciones", "bkl_area_id" =>2),
            array("name" => "Facturación", "bkl_area_id" =>3),
            array("name" => "Experiencia Clientes", "bkl_area_id" =>4),
            array("name" => "Sistemas de informacion", "bkl_area_id" =>5),
            array("name" => "Comercial", "bkl_area_id" =>6),
            array("name" => "Juridica", "bkl_area_id" =>7),
        );

        foreach ($managements as $key => $management) {
            BklManagement::create($management);
        }
    }
}
