<?php

namespace Database\Seeders;

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
        $this->call(CategoryTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WebsiteTableSeeder::class);
        $this->call(AdminHomeTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderMenuSeeder::class);
    }
}
