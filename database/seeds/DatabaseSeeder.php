<?php

use Database\Seeders\CreateLogoSeeder;
use Database\Seeders\CreatePermissionRoleSeeder;
use Database\Seeders\CreatePermissionSeeder;
use Database\Seeders\CreateRoleSeeder;
use Database\Seeders\CreateUserSeeder;
use Database\Seeders\CreateUserStatusSeeder;
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
        // $this->call(UserSeeder::class);
        $this->call(CreatePermissionSeeder::class);
        $this->call(CreateRoleSeeder::class);
        $this->call(CreatePermissionRoleSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateUserStatusSeeder::class);
        $this->call(CreateLogoSeeder::class);
    }
}
