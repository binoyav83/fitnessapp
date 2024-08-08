<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                [
                     'name' => 'Manu',
                     'email' => 'manu@applab.qa',
                     'password' => Hash::make('12345678'),
                 ],
                 [
                     'name' => 'Binoy',
                     'email' => 'binoyav@gmail.com',
                     'password' => Hash::make('12345678'),
                 ],
                 [
                    'name' => 'Salim',
                    'email' => 'salim@applab.qa',
                    'password' => Hash::make('12345678'),
                ]
             ]);
    }
}
