<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Worker_ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shift_worker')->insert([
            'worker_id' => 1,
            'shift_id' => 1,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 3,
            'shift_id' => 1,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 4,
            'shift_id' => 1,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 2,
            'shift_id' => 2,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 1,
            'shift_id' => 2,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 3,
            'shift_id' => 2,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 4,
            'shift_id' => 2,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 2,
            'shift_id' => 3,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 1,
            'shift_id' => 3,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 1,
            'shift_id' => 4,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 4,
            'shift_id' => 4,
        ]);
        DB::table('shift_worker')->insert([
            'worker_id' => 3,
            'shift_id' => 4,
        ]);
    }
}
