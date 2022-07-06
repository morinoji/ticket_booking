<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'full_name' => 'admin',
                'email' => 'admin',
                'dob' => 'admin',
                'phone' => 'admin',
                'position' => 'admin',
                'depart' => 'admin',
                'password' => Hash::make("1111"),
                'is_admin'=> 2,
                'role_id'=> 1,
            ],
            [
                'full_name' => 'employee',
                'email' => 'employee',
                'dob' => 'employee',
                'phone' => 'employee',
                'position' => 'employee',
                'depart' => 'employee',
                'password' => Hash::make("1111"),
                'is_admin'=> 1,
                'role_id'=> 2,
            ],
        ]);
    }
}
