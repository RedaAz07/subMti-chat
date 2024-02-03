<?php

namespace Database\Factories;

use App\Models\etudientsInfo;
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
            'etud_id' => etudientsInfo::factory()->create()->id,
            "email"=>fake()->email,
            "newPAssword"=>fake()->password()

        ];
    }
}
