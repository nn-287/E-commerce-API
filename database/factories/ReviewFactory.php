<?php

namespace Database\Factories;

use App\Models\product;
use App\Models\review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = review::class;

    public function definition()
    {
        return [

            'product_id'=>function(){

                return product::all()->random();


            },
            'customer'=>$this->faker->unique()->name,
            'review'=>$this->faker->paragraph,
            'star'=>$this->faker->numberBetween(0,5),

        ];
    }
}
