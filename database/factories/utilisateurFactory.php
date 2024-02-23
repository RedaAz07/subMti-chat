<?php

namespace Database\Factories;

use App\Models\admin;
use App\Models\etudient;
use App\Models\etudientsInfo;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\utilisateur>
 */
class utilisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'password' => fake()->regexify('[A-Za-z0-9@#$%^&+=]{8}'),
            'id_admin' => admin::factory()->create()->id_admin,
            'id_formateur' => formateur::factory()->create()->id_formateur,
            'id_etudient' => etudient::factory()->create()->id_etudient,






            "email"=>fake()->email,
            "newPAssword"=>fake()->password()

        ];
    }
}
