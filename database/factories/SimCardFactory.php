<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SimCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'iccid' => $this->faker->unique()->numerify('####################'),
          'network_provider_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
