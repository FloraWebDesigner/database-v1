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
            'name' => fake()->name(),
            'owner' => fake()->word(),
            'pull_requests' => fake()->numberBetween(-10000, 10000),
            'error_readme_exists' => fake()->boolean(),
            'error_readme_contents' => fake()->boolean(),
            'error_favicon_exists' => fake()->boolean(),
            'error_gitignore_exists' => fake()->boolean(),
            'error_gitignore_contents' => fake()->boolean(),
            'error_protected' => fake()->boolean(),
            'error_description' => fake()->boolean(),
            'error_topics' => fake()->boolean(),
            'error_comments' => fake()->text(),
            'error_count' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
