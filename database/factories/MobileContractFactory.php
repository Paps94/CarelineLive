<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobileContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => $this->faker->numberBetween(1, 5),
          'network_provider_id' => $this->faker->numberBetween(1, 5),
          'sim_card_id' => $this->faker->numberBetween(1, 5),
          'phone_number_id' => $this->faker->numberBetween(1, 5),
          'duration' => $this->faker->randomElement([1, 12, 18, 24]),
          'exipres' => $this->faker->dateTimeThisYear('+2 months')
        ];
    }
}
