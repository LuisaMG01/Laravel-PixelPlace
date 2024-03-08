<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'image' => $this->faker->imageUrl,
            'brand' => $this->faker->company,
            'keywords' => json_encode([$this->faker->word, $this->faker->word]),
            'stock' => $this->faker->numberBetween($min = 200, $max = 9000),
            'description' => $this->faker->sentence,
        ];
    }
}
