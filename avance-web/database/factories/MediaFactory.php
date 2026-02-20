<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'file_path' => 'uploads/' . fake()->uuid() . '.jpg',
            'type' => fake()->randomElement(['image', 'document', 'video']),
            'title' => fake()->sentence(3),
        ];
    }
}
