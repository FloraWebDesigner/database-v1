<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Building;
use App\Models\City;
use App\Models\Road;

class BuildingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Building::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'set' => $this->faker->word(),
            'colour' => $this->faker->word(),
            'number' => $this->faker->numberBetween(-10000, 10000),
            'road_id' => Road::factory(),
            'city_id' => City::factory(),
        ];
    }
}
