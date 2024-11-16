<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;
use App\Models\Road;
use App\Models\Square;
use App\Models\Track;

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
            'x' => $this->faker->numberBetween(-10000, 10000),
            'y' => $this->faker->numberBetween(-10000, 10000),
            'road_id' => Road::factory(),
            'road_rules' => $this->faker->word(),
            'track_id' => Track::factory(),
            'track_rules' => $this->faker->word(),
            'type' => $this->faker->randomElement(["ground","water"]),
            'building_id' => Building::factory(),
            'city_id' => City::factory(),
        ];
    }
}
