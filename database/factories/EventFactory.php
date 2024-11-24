<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'event_name' => $this->faker->word(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
            'photo' => $this->faker->text(),
            'organizer' => $this->faker->word(),
            'location' => $this->faker->word(),
            'detail_description' => $this->faker->text(),
            'max_capacity' => $this->faker->numberBetween(-10000, 10000),
            'tickets_bought' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
