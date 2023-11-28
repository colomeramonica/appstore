<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 10;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('app_category')->insert([
                'app_id' => rand(2, 21), 
                'category_id' => rand(1, 5), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
