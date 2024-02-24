<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\etudient>
 */
class etudientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_etudient' =>fake()->unique()->numberBetween(1, 1000),
            "nom"=>fake()->firstName(),
            "prenom"=>fake()->lastName(),
            "dateNaissance"=>fake()->date($format = 'Y-m-d', $max = 'now'),
            'telephone' => fake()->phoneNumber(),
            'addresse' => fake()->address(),

            'CIN' => fake()->regexify('[A-Z][0-9]{6}'),





        ];
    }
}
