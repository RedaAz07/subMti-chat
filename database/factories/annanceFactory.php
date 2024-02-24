<?php

namespace Database\Factories;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\annance>
 */
class annanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_admin' => admin::inRandomOrder()->first()->id_admin,




            "contenu"=>fake()->text(),
            "file"=>fake()->text(),







        ];

    }
}
