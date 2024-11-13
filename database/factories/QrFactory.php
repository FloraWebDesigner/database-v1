<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Qr;

class QrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qr::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'hash' => $this->faker->word(),
            'url' => $this->faker->url(),
            'image' => $this->faker->text(),
            'city_id' => City::factory(),
        ];
    }
}
