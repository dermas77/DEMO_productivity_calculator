<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Product_1',
            'pieces_per_hour' => 0,
        ]);
        DB::table('products')->insert([
            'name' => 'Product_2',
            'pieces_per_hour' => 80,
        ]);
    }
}
