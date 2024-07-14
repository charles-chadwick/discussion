<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *`
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topic_id' => null,
            'content' => implode("<br /><br />", fake()->paragraphs(rand(1, 6))),
            'created_at' => fake()->dateTimeBetween("-2 years", "-10 minutes"),
            'created_by' => 1,
        ];
    }
}
