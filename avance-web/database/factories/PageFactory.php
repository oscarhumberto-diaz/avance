<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(3);

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'excerpt' => fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['draft', 'published']),
            'published_at' => now(),
            'parent_id' => null,
            'order' => fake()->numberBetween(0, 50),
        ];
    }
}
