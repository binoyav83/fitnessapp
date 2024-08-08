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
                 'start_time' => '2024-03-23 00:00:00',
                 'end_time' => '2024-03-24 00:00:00',
             ],
             [
                'step_count' => '233',
                'user_id' => 2,
                'start_time' => '2024-03-23 00:00:00',
                'end_time' => '2024-03-23 00:00:00',
            ],
            [
                'step_count' => '12332',
                'user_id' => 1,
                'start_time' => '2024-03-24 00:00:00',
                'end_time' => '2024-03-24 00:00:00',
            ],
         ]);
    }
}
