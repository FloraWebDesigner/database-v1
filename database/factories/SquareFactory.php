<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;
use App\Models\Square;

class SquareFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Square::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'x' => fake()->numberBetween(-10000, 10000),
            'y' => fake()->numberBetween(-10000, 10000),
            'road_rules' => fake()->word(),
            'track_rules' => fake()->word(),
            'type' => fake()->randomElement(["ground","water"]),
            'building_id' => Building::factory(),
            'city_id' => City::factory(),
        ];
    }
}
