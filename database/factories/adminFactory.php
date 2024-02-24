<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_admin' =>fake()->unique()->numberBetween(1, 1000),
            "nom"=>fake()->firstName(),
            "prenom"=>fake()->lastName(),

            'telephone' => fake()->phoneNumber(),
            'addresse' => fake()->address(),







        ];

    }
}
