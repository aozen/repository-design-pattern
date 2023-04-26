<?php

namespace Database\Factories;

use App\Enums\CommentStatus;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'body' => $this->faker->paragraph(2),
            'rate' => $this->faker->numberBetween(1, 5),
            'status' => CommentStatus::DRAFT->value,
        ];
    }
}
