<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'view_users', 'display_name' => 'Ver usuarios'],
            ['name' => 'create_users', 'display_name' => 'Crear usuarios'],
            ['name' => 'edit_users', 'display_name' => 'Editar usuarios'],
            ['name' => 'delete_users', 'display_name' => 'Eliminar usuarios'],
            ['name' => 'view_roles', 'display_name' => 'Ver roles'],
            ['name' => 'create_roles', 'display_name' => 'Crear roles'],
            ['name' => 'edit_roles', 'display_name' => 'Editar roles'],
            ['name' => 'delete_roles', 'display_name' => 'Eliminar roles'],
            ['name' => 'view_mediafiles', 'display_name' => 'Ver multimedia'],
            ['name' => 'create_mediafiles', 'display_name' => 'Crear multimedia'],
            ['name' => 'edit_mediafiles', 'display_name' => 'Editar multimedia'],
            ['name' => 'delete_mediafiles', 'display_name' => 'Eliminar multimedia'],
            ['name' => 'view_vacancies', 'display_name' => 'Ver vacantes'],
            ['name' => 'create_vacancies', 'display_name' => 'Crear vacantes'],
            ['name' => 'edit_vacancies', 'display_name' => 'Editar vacantes'],
            ['name' => 'delete_vacancies', 'display_name' => 'Eliminar vacantes'],
            ['name' => 'create_image', 'display_name' => 'Crear imagen'],
            ['name' => 'approve_image', 'display_name' => 'Aprobar imagen'],
            ['name' => 'reject_image', 'display_name' => 'Rechazar imagen'],
            ['name' => 'delete_image', 'display_name' => 'Eliminar imagen'],
            ['name' => 'edit_image', 'display_name' => 'Editar imagen'],
            ['name' => 'view_notifications', 'display_name' => 'Ver notificaciones'],
            ['name' => 'create_notifications', 'display_name' => 'Crear notificaciones'],
            ['name' => 'edit_notifications', 'display_name' => 'Editar notificaciones'],
            ['name' => 'delete_notifications', 'display_name' => 'Eliminar notificaciones'],
        ];

        foreach ($permissions as $key => $permission) {
            Permission::create($permission);
        }
    }
}
