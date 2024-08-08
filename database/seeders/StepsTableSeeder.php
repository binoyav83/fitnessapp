<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('steps')->insert([
            [
                 'step_count' => '123333',
                 'user_id' => 1,
                 'start_time' => '2024-08-08 00:00:00',
                 'end_time' => '2024-08-08 23:59:59',
             ],
             [
                'step_count' => '233',
                'user_id' => 2,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '12332',
                'user_id' => 3,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '5555',
                'user_id' => 4,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '1000',
                'user_id' => 5,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '2220',
                'user_id' => 6,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '1001',
                'user_id' => 7,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
            [
                'step_count' => '4000',
                'user_id' => 8,
                'start_time' => '2024-08-08 00:00:00',
                'end_time' => '2024-08-08 23:59:59',
            ],
             
         ]);
    }
}
