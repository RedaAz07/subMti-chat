<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\etudientsInfo>
 */
class etudientsInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>fake()->firstName(),
            "prenom"=>fake()->lastName(),
            "dateNaissance"=>fake()->date($format = 'Y-m-d', $max = 'now'),
            'CIN' => fake()->regexify('[A-Z][0-9]{6}')



        ];
    }
}
