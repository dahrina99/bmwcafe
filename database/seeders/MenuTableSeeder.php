<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mie Aceh
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Mie Aceh ' . $i,
                'slug' => 'MieAceh-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '1',
            ]);
        }

        // Nasi Goreng Aceh
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Nasi Goreng ' . $i,
                'slug' => 'NasiGoreng-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '2',
            ]);
        }

        // Roti Canai
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Roti Canai ' . $i,
                'slug' => 'RotiCanai-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '3',
            ]);
        }

        // Martabak
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Martabak ' . $i,
                'slug' => 'Martabak-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '4',
            ]);
        }

        // Nasi Briyani
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Nasi Briyani ' . $i,
                'slug' => 'NasiBriyani-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '5',
            ]);
        }

        // Minuman
        for ($i = 1; $i <= 0; $i++) {
            Menu::create([
                'name' => 'Minuman ' . $i,
                'slug' => 'Minuman-' . $i,
                'description' => 'Rempah-rempah khas Aceh',
                'price' => rand(12000, 50000),
                'image' => 'test.png',
                'category_id' => '6',
            ]);
        }
    }
}
