<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shifts')->insert([
            'date' => '2020-01-01',
            'work_center_id' => 1,
            'product_id' => 1,
            'pieces' => 683,
        ]);
        DB::table('shifts')->insert([
            'date' => '2020-01-02',
            'work_center_id' => 2,
            'product_id' => 2,
            'pieces' => 634,
        ]);
        DB::table('shifts')->insert([
            'date' => '2020-01-03',
            'work_center_id' => 1,
            'product_id' => 2,
            'pieces' => 601,
        ]);
        DB::table('shifts')->insert([
            'date' => '2020-01-04',
            'work_center_id' => 2,
            'product_id' => 1,
            'pieces' => 656,
        ]);
    }
}
