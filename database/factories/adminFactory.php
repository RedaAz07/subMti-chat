<?php

namespace Database\Factories;

use App\Models\admin;
use App\Models\utilisateur;
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
            "nom"=>fake()->firstName(),
            "prenom"=>fake()->lastName(),

            'id_utilisateur' => utilisateur::inRandomOrder()->first()->id_utilisateur,

            'telephone' => fake()->phoneNumber(),
            'addresse' => fake()->address(),







        ];

    }
}
