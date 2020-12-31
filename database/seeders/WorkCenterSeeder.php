<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WorkCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_centers')->insert([
            'name' => 'WorkCenter_1',
            'pieces_per_hour' => 100,
        ]);
        DB::table('work_centers')->insert([
            'name' => 'WorkCenter_2',
            'pieces_per_hour' => 120,
        ]);
    }
}
