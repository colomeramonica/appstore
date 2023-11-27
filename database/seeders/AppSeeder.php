<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfRecords = 20;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('app')->insert([
                'dev_id' => rand(1, 10), 
                'name' => 'App ' . ($i + 1),
                'description' => 'Description for App ' . ($i + 1),
                'status' => rand(0, 1), 
                'display_option' => rand(1, 3), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

