<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\;
use App\Models\MediaDownload;
use App\Models\User;

class MediaDownloadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MediaDownload::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'media_id' => ::factory(),
            'user_id' => User::factory(),
        ];
    }
}
