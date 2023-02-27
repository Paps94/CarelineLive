<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
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
          'type' => $this->faker->randomElement(['phone', 'tablet']),
          'serial_number' => Str::random(15),
          'imei' => $this->faker->unique()->numerify('1234567890#####'),
          'manufacturer' => $this->faker->name(),
          'model' => $this->faker->text(10),
          'operating_system' => $this->faker->randomElement(['iOs', 'Android']),
          'deactivated' => $this->faker->boolean()
        ];
    }
}
