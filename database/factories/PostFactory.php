<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $users = User::all();
        $user_id = [];

        $i = 0;

        foreach($users as $user){
            $user_id[$i] = $user->id;
            $i += 1;
        }

        return [
            'user_id' => fake()->randomElement($user_id),
            'image' => 'images/Login-bg.png',
            'caption' => fake()->text()
        ];
    }
}
