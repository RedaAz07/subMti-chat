<?php

namespace Database\Factories;

use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\message>
 */
class messageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_utilisateur' => utilisateur::factory()->create()->id_utilisateur,
            "contenu"=>fake()->text(),
            "file"=>fake()->text(),







        ];

    }
}
