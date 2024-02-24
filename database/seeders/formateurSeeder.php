<?php

namespace Database\Seeders;

use App\Models\formateur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class formateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        formateur::factory(10)->create();

    }
}
