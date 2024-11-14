<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Square;
use App\Models\SquareImage;

class SquareImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SquareImage::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'square_id' => Square::factory(),
            'direction' => $this->faker->randomElement(["north","east","south","west"]),
            'image' => $this->faker->text(),
        ];
    }
}
