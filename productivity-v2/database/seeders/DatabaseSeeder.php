<?php

namespace Database\Seeders;

use App\Models\BklPriority;
use App\Models\BklType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            UsersSeeder::class,
            StatesAndCitiesSeeder::class,
            CategoriesSeeder::class,
            NotificationsSeeder::class,
            StatusesSeeder::class,
            UsersRecruitersSeeder::class,
            BklRoleSeeder::class,
            BklAreaSeeder::class,
             BklManagementSeeder::class,
            BklTypeSeeder::class,
            BklStateSeeder::class,
            BklPrioritySeeder::class
            // VacanciesSeeder::class,
        ]);
    }
}
