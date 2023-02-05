<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->realText(rand(40, 50));
        return [
            'category_id' => rand(1, 4),
            'name' => $name,
            'content' => $this->faker->realText(rand(400, 500)),
            'price' => rand(1, 60000),
            'slug' => Str::slug($name),
        ];

    }
}
