<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacanciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacancy::create([
            "user_id" => 1,
            "category_id" => 3,
            "position" => "Asesor comercial",
            "city_id" => 846,
            "description" => "ÁREA Y POSICIÓN: Reconocida compañía requiere Asesor Comercial PERFIL: Bachiller EXPERIENCIA: mínimo 6 meses en el cargo REQUISITOS: - Estudios relacionados con ventas y/o mercadeo - Conocimiento en inventarios, stock - Excelente presentación personal - Habilidades de abordaje al cliente FUNCIONES: Asesorar al cliente HORARIO: Disponibilidad para laborar en horario de domingo a domingo con un día compensatorio a la semana. CONTRATO: obra o labor ",
            "erp_vacancy_id" => 40484,
            "link" => 'https://manpowergroupco.avature.net/es_CO/empleate/JobDetail/Cali-Valle-del-Cauca-Director-de-Operaciones/40671',
            "salary" => "Salario: $ 1.160.000 + prestaciones",
            "status_id" => Status::where('id', 1)->value('id')
        ]);
    }
}
