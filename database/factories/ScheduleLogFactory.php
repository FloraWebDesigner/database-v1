<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Schedule;
use App\Models\ScheduleLog;

class ScheduleLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScheduleLog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'script' => $this->faker->text(),
            'schedule_id' => Schedule::factory(),
            'city_id' => City::factory(),
            'play_at' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["queued","played"]),
        ];
    }
}
