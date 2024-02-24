<?php

namespace Database\Seeders;

use App\Models\message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class messageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        message::factory(100)->create();

    }
}
