<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? \App\Models\User::factory()->create()->id, // ユーザーIDをランダムに取得または新規作成
            'title' => $this->faker->sentence,  // ランダムなタイトル
            'content' => $this->faker->paragraph(5),  // 5段落のダミー本文
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
