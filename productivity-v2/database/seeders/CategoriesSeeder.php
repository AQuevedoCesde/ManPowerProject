<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            "Administración y Gerencia",
            "Ventas y Marketing",
            "Finanzas y Contabilidad",
            "Recursos Humanos",
            "Tecnología de la Información (TI)",
            "Ingeniería y Producción",
            "Salud y Ciencias Médicas",
            "Educación y Docencia",
            "Servicio al Cliente",
            "Legal y Derecho",
            "Comunicación y Medios",
            "Diseño y Creatividad",
            "Logística y Transporte",
            "Construcción y Mantenimiento",
            "Investigación y Desarrollo",
            "Consultoría",
            "Compras y Abastecimiento",
            "Turismo y Hospitalidad",
            "Agricultura y Medio Ambiente",
            "Seguridad y Vigilancia",
            "Arte y Entretenimiento",
            "Sin ánimo de lucro y Organizaciones Sociales",
            "Gobierno y Servicio Público"
        );

        foreach ($categories as $key => $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
