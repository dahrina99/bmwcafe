<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'category_name' => 'Signature Menu',
            'slug' => 'signature_menu',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Manual Brew',
            'slug' => 'manual_brew',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Esspresso Based(Arabica)',
            'slug' => 'esspresso',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Other Coffee',
            'slug' => 'other',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Non-Coffee',
            'slug' => 'non coffee',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Snack',
            'slug' => 'snack',
        ]);
    }
}
