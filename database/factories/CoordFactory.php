<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Coord;

class CoordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coord::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(["car","train"]),
            'x' => $this->faker->numberBetween(-10000, 10000),
            'y' => $this->faker->numberBetween(-10000, 10000),
            'city_id' => City::factory(),
        ];
    }
}
