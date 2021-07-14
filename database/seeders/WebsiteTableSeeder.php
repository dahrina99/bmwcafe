<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;
use Illuminate\Support\Facades\DB;

class WebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            'description' => 'Makanan dan minuman khas Aceh, dari Mie Aceh sampai Briyani',
            'about' => 'Bertempat di Cilegon Banten',
            'email' => 'mieaceh@gmail.com',
            'phone' => '081234567890',
            'instagram' => '@mieaceh',
        ]);
    }
}
