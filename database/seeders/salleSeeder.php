<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\salles;

class salleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        salles::factory()->count(10)->create();
    }
}
