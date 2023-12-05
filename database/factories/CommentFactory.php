<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $users = User::all();
        $posts = Post::all();

        $user_id = [];
        $post_id = [];

        $i = 0;
        $j = 0;

        foreach($users as $user){
            $user_id[$i] = $user->id;
            $i += 1;
        }

        foreach($posts as $post){
            $post_id[$j] = $post->id;
            $j += 1;
        }

        return [
            'user_id' => fake()->randomElement($user_id),
            'post_id' => fake()->randomElement($post_id),
            'comment' => fake()->text()
        ];
    }
}
