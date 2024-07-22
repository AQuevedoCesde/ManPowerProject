<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [
                'name' => 'Comunicaciones aprobar pieza',
                'emails' => 'adrian.cano@manpowergroup.com.co, adriancanoj1994@gmail.com'
            ]
        ];

        foreach ($notifications as $key => $notification) {
            Notification::create($notification);
        }
    }
}
