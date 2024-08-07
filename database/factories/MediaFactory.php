<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\Media;
use App\Models\User;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'thumbnail' => $this->faker->word(),
            'image' => $this->faker->text(),
            'video' => $this->faker->word(),
            'approved' => $this->faker->boolean(),
            'user_id' => User::factory(),
            'city_id' => ::factory(),
        ];
    }
}
