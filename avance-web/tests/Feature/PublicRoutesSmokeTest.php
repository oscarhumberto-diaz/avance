<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesSmokeTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_routes_return_200(): void
    {
        Page::factory()->create([
            'slug' => 'inicio',
            'status' => 'published',
            'published_at' => now(),
        ]);

        Page::factory()->create([
            'slug' => 'que-es-avance',
            'status' => 'published',
            'published_at' => now(),
        ]);

        foreach ([
            '/',
            '/que-es-avance',
            '/principios',
            '/materiales',
            '/calendario',
            '/inscripciones',
            '/testimonios',
            '/blog',
        ] as $uri) {
            $this->get($uri)->assertOk();
        }
    }
}
