<?php

namespace Database\Factories;

use App\Models\filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'num_groupe' => fake()->regexify('/^100(?!1\d\d|2\d\d)\d{3}$/'),
            'id_filiere' => filiere::factory()->create()->id_filiere,







        ];

    }
}
