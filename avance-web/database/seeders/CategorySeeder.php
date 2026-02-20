<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory()->count(3)->create();

        Category::updateOrCreate(['slug' => 'blog'], ['name' => 'Blog', 'description' => 'Categoría para artículos del blog.']);
        Category::updateOrCreate(['slug' => 'materiales'], ['name' => 'Materiales', 'description' => 'Categoría para recursos y materiales.']);
    }
}
