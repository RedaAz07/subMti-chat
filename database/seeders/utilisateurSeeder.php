<?php

namespace Database\Seeders;

use App\Models\utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class utilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        utilisateur::factory(111)->create();
    }
}

