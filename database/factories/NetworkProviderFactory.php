<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'provider' => $this->faker->name(),
        ];
    }
}
