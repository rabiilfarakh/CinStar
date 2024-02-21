<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\films;

class filmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        films::factory()->count(3)->create();
    }
}
