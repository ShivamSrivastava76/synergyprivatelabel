<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sizes from 1 to 100
        for ($i = 1; $i <= 100; $i++) {
            Size::create([
                'size' => $i,
                'status' => 0,
            ]);
        }
    }
}
