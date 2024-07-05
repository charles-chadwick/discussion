<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->bs();
        return [
            'type' => 'n/a',
            'title' => Str::title($title),
            'slug' => Str::slug($title),
            'created_at' => fake()->dateTimeBetween("-2 years", "-10 minutes"),
            'created_by' => 1,
        ];
    }
}
