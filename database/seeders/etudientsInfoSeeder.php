<?php

namespace Database\Seeders;

use App\Models\etudientsInfo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class etudientsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            etudientsInfo::factory(100)->create();

}
}
