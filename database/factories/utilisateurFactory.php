<?php

namespace Database\Factories;

use App\Models\admin;
use App\Models\etudient;

use App\Models\formateur;
use App\Models\utilisateur;
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


            // 'id_admin' => admin::inRandomOrder()->first()->id_admin,
            // 'id_formateur' => formateur::inRandomOrder()->first()->id_formateur,
            // 'id_etudient' => etudient::inRandomOrder()->first()->id_etudient,



            "type"=>fake()->name(),


            "email"=>fake()->email,
            "newPAssword"=>fake()->password()

        ];
    }
}
