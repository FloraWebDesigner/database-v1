<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Qr;
use App\Models\QrLog;

class QrLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QrLog::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'hash' => $this->faker->word(),
            'url' => $this->faker->url(),
            'qr_id' => Qr::factory(),
        ];
    }
}
