<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),  // Random task title
            'product_qty' => 1,
            'product_brand' => 'test'
        ];
    }
}
