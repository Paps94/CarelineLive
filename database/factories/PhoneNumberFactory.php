<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'network_provider_id' => $this->faker->numberBetween(1, 5),
          'sim_card_id' => $this->faker->numberBetween(1, 5),
          'number' => $this->faker->unique()->numerify('7#########')
        ];
    }
}
