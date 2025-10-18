<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'title' => Str::title($title),
            'slug' => Str::slug($title . '-' . fake()->numberBetween(1, 9999)),
            'cover_image' => fake()->imageUrl(1280, 720, 'travel', true),
            'excerpt' => fake()->paragraph(2),
            'content' => collect(range(1, 5))->map(fn () => '<p>' . fake()->paragraph(5) . '</p>')->implode("\n"),
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
