<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_statuses')->insert([
            [
                "name" => "Hoạt động",
            ],
            [
                "name" => "Khóa",
            ],
        ]);
    }
}
