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
            'url' => $this->faker->url(),
            'width' => $this->faker->numberBetween(-10000, 10000),
            'height' => $this->faker->numberBetween(-10000, 10000),
            'image' => $this->faker->text(),
            'date_at' => $this->faker->dateTime(),
            'date_multiplier' => $this->faker->numberBetween(-10000, 10000),
            'user_id' => User::factory(),
        ];
    }
}
