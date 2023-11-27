<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberOfRecords = 10;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('apps_category')->insert([
                'app_id' => rand(3, 22), 
                'category_id' => rand(1, 5), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

