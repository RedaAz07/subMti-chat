<?php

namespace Database\Factories;

use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formateur>
 */
class formateurFactory extends Factory
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



            'telephone' => fake()->phoneNumber(),
            'addresse' => fake()->address(),

            'id_utilisateur' => utilisateur::inRandomOrder()->first()->id_utilisateur,








        ];

    }
}
