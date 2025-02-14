<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ville>
 */
class VilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ville' => $this->faker->city,  // Génère un nom de ville aléatoire
            'nombreHabitats' => $this->faker->numberBetween(1000, 5000),  // Nombre d'habitants pour la ville
        ];
    }
}
