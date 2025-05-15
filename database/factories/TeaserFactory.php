<?php

namespace Database\Factories;

use App\Models\Teaser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeaserFactory extends Factory
{
    protected $model = Teaser::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'headline' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image_path' => 'teasers/' . $this->faker->uuid . '.jpg',
        ];
    }
}
