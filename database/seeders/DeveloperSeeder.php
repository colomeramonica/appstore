<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfRecords = 10;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('developer')->insert([
                'company_name' => 'Developer Company ' . ($i + 1),
                'email' => 'developer' . ($i + 1) . '@gmail.com',
                'contact_number' => '123456789' . $i, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
