<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitant>
 */
class HabitantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cin'      => $this->faker->unique()->numerify('########'),
            'nom'      => $this->faker->lastName,
            'prenom'   => $this->faker->firstName,
            'ville_id' => Ville::inRandomOrder()->first()->id ?? Ville::factory(), 
            'photo'    => 'https://www.voyage-martinique.fr/wp-content/uploads/2017/12/nombre-habitants-martinique.png',
        ];
    }
}
