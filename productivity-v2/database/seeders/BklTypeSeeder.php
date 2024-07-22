<?php

namespace Database\Seeders;

use App\Models\BklType;
use Illuminate\Database\Seeder;

class BklTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types=array(
            "RM",
            "CM",
            "PR",
            "CP",
            "EX",
            "OS"
        );

        foreach($types as $key => $type){
            BklType::create([
                'name' => $type
            ]);
        }
    }
}
