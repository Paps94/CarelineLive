<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceTrackingFactory extends Factory
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
          'device_id' => $this->faker->numberBetween(1, 5),
          'active' => $this->faker->boolean()
        ];
    }
}
