<?php

namespace Database\Factories;

use App\Models\filiere;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupe>
 */
class groupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        return [

            'num_groupe' => fake()->numberBetween(100, 300),



            'id_filiere' => filiere::inRandomOrder()->first()->id_filiere,






        ];

    }
}
