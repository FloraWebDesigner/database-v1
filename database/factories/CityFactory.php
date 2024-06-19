<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\User;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'width' => $this->faker->numberBetween(-10000, 10000),
            'length' => $this->faker->numberBetween(-10000, 10000),
            'image' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}
