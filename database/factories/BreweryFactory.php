<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brewery>
 */
class BreweryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brewery_type' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'name' => $this->faker->name(),
            'brewery_id' => $this->faker->name(),
        ];
    }
}
