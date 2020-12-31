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
        $this->call([
            ProductSeeder::class,
            ShiftSeeder::class,
            WorkCenterSeeder::class,
            Worker_ShiftSeeder::class,
            WorkerSeeder::class,
        ]);
    }
}
