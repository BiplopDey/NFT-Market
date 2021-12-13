<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'img' => $this->faker->imageUrl()
        ];
    }
}
