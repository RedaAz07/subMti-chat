<?php

namespace Database\Seeders;

use App\Models\filiere;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class filiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        filiere::factory(4)->create();

    }
}
