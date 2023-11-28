<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 20;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('app')->insert([
                'dev_id' => rand(1, 10), 
                'name' => 'App ' . ($i + 1),
                'description' => 'Description for App ' . ($i + 1),
                'price' => rand(2, 200) / 100,
                'status' => rand(0, 1), 
                'rating' => rand(0, 5) / 100,
                'display_option' => rand(1, 3), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
