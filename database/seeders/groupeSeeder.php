<?php

namespace Database\Seeders;

use App\Models\groupe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class groupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        groupe::factory(5)->create();

    }
}
