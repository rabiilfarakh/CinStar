<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\salle;

class salleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        salle::factory()->count(10)->create();
    }
}
