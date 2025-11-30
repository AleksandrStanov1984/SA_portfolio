<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'name'    => $this->faker->name(),
            'comment' => $this->faker->sentence(8),
            'rating'  => $this->faker->numberBetween(1, 5),
            'locale'  => 'de',
            'approved'=> true,
        ];
    }
}
