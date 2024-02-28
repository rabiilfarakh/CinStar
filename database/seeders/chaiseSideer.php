<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\chaises;

class chaiseSideer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        chaises::factory()->count(30)->create();
    }
}
