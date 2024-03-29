<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 5;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('category')->insert([
                'name' => 'Category ' . ($i + 1),
                'description' => 'Description for Category ' . ($i + 1),
                'status' => rand(0, 1), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
