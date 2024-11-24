<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Task;
use App\Models\Timesheet;
use App\Models\User;

class TimesheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timesheet::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'hours_worked' => $this->faker->randomFloat(2, 0, 99.99),
            'description' => $this->faker->text(),
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'task_id' => Task::factory(),
        ];
    }
}
