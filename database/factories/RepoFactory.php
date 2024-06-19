<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Repo;

class RepoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Repo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'owner' => $this->faker->word(),
            'readme' => $this->faker->text(),
            'json' => $this->faker->text(),
            'error_readme' => $this->faker->boolean(),
            'error_favicon' => $this->faker->boolean(),
            'error_gitignore' => $this->faker->boolean(),
            'error_pages' => $this->faker->boolean(),
            'error_protected' => $this->faker->boolean(),
            'error_cdn' => $this->faker->boolean(),
            'error_pull' => $this->faker->boolean(),
        ];
    }
}
