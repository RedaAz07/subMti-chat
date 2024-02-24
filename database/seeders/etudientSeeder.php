<?php

namespace Database\Seeders;

use App\Models\etudient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class etudientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    etudient::factory(100)->create();

    }
}
