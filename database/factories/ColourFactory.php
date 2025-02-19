<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Colour;

class ColourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Colour::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'rgb' => fake()->word(),
            'is_trans' => fake()->word(),
            'rebrickable_id' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
