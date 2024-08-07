<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Colour;
use App\Models\External;

class ExternalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = External::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'source' => $this->faker->randomElement(["brickowl","bricklink","ldraw","lego","peeron"]),
            'colour_id' => Colour::factory(),
        ];
    }
}
