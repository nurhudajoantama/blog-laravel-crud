<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence(3);
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->paragraph,
            'image' => null,
            'user_id' => 1,
        ];
    }
}
