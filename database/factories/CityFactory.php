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
            'name' => fake()->name(),
            'url' => fake()->url(),
            'width' => fake()->numberBetween(-10000, 10000),
            'height' => fake()->numberBetween(-10000, 10000),
            'image' => fake()->text(),
            'date_at' => fake()->dateTime(),
            'date_multiplier' => fake()->numberBetween(-10000, 10000),
            'user_id' => User::factory(),
        ];
    }
}
