<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workers')->insert([
            'name' => 'Taylor',
            'surname' => 'Otwell',

        ]);
        DB::table('workers')->insert([
            'name' => 'Mohamed',
            'surname' => 'Said',

        ]);
        DB::table('workers')->insert([
            'name' => 'Jeffrey',
            'surname' => 'Way',

        ]);
        DB::table('workers')->insert([
            'name' => 'Phill',
            'surname' => 'Sparks',

        ]);
    }
}
