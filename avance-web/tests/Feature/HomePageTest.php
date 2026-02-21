<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads(): void
    {
        $page = new Page();
        $page->slug = 'inicio';
        $page->title = 'Inicio';
        $page->body = '<h1>Inicio</h1>';
        $page->status = 'published';
        $page->published_at = now();
        $page->save();

        $this->get('/')->assertOk();
    }
}
