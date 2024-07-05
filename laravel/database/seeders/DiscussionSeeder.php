<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // I am not sure how to use the Sequence() class to generate a random user for it's ID and created_at
        // fields, so I 'm going to do this a little different
        for ($i = 1; $i <= 50; $i++) {
            $user = User::inRandomOrder()
                        ->first();
            $topic = Topic::factory()
                          ->create([
                              'type'       => 'discuss',
                              'created_at' => fake()->dateTimeBetween($user->created_at, '-2 weeks'),
                              'created_by' => $user->id,
                          ]);

            // now we kind of do the same for posts
            for($post_index = 1; $post_index <= rand(1, 10); $post_index++)
            {
                $created_by = $user->id;
                $created_at = $topic->created_at;

                if ($post_index > 1) {
                    $created_at = fake()->dateTimeBetween($topic->created_at, '-1 weeks');
                    $created_by = User::inRandomOrder()->first()->id;
                }

                Post::factory()->create([
                    'topic_id' => $topic->id,
                    'created_by' => $created_by,
                    'created_at' => $created_at,
                ]);
            }
        }

    }
}
