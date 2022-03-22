<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'link' => $this->faker->name(),
            'image' => $this->faker->image(),
            'description' => $this->faker->name(), // password
            'status' => true,
        ];
    }
}
