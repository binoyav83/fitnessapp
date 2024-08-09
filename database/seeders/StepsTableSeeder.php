<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Step;
use Carbon\Carbon;

class StepsTableSeeder extends Seeder
{
    protected $connection = 'mongodb';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Step::query()->delete();
        Step::insert([
            [
                 'stepsCount' => 123333,
                 'user_id' => 1,
                 'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                 'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
             ],
             [
                'stepsCount' => 233,
                'user_id' => 2,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 12332,
                'user_id' => 3,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 5555,
                'user_id' => 4,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 1000,
                'user_id' => 5,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 2220,
                'user_id' => 6,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 1001,
                'user_id' => 7,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
            [
                'stepsCount' => 4000,
                'user_id' => 8,
                'start_time' => Carbon::parse(date('Y-m-d') . ' 00:00:00'),
                'end_time' => Carbon::parse(date('Y-m-d') . ' 23:59:59'),
            ],
             
         ]);
    }
}
