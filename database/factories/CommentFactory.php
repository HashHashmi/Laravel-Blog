<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Posts;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * protected $model = Comment::class;
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => Posts::factory(),
            'user_id' => User::factory(),
            'body' => $this->faker->paragraph()
        ];
    }
}
