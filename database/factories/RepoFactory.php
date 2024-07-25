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
            'pull_requests' => $this->faker->numberBetween(-10000, 10000),
            'error_readme_exists' => $this->faker->boolean(),
            'error_readme_contents' => $this->faker->boolean(),
            'error_favicon_exists' => $this->faker->boolean(),
            'error_gitignore_exists' => $this->faker->boolean(),
            'error_gitignore_contents' => $this->faker->boolean(),
            'error_protected' => $this->faker->boolean(),
            'error_description' => $this->faker->boolean(),
            'error_topics' => $this->faker->boolean(),
            'error_comments' => $this->faker->text(),
        ];
    }
}
