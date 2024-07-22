<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Adrian Cano J',
                'email' => 'adrian.cano@manpowergroup.com.co',
                'password' => Hash::make('Secret01++')
            ],
            [
                'name' => 'Mateo Quintero',
                'email' => 'mateo.quintero@manpowergroup.com.co',
                'password' => Hash::make('Secret01++')
            ],
            [
                'name' => 'Miguel angel lopez',
                'email' => 'miguel.lopez@manpowergroup.com.co',
                'password' => Hash::make('Secret01++')
            ],
            [
                'name' => 'Andres Quevedo',
                'email' => 'andres.quevedo@manpowergroup.com.co',
                'password' => Hash::make('Secret01++')
            ],
        ];

        foreach ($users as $key => $value) {
            $user = User::create($value);
            $user->assignRole('admin');
        }
    }
}
