<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = product::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->name,
            'detail'=>$this->faker->text(180),
            'price'=>$this->faker->numberBetween(100,1000),
            'stock'=>$this->faker->randomDigit(),
            'discount'=>$this->faker->numberBetween(2,30)

        ];
    }
}
