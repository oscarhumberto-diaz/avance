<?php

namespace Tests\Feature;

use Tests\TestCase;

class SmokeTest extends TestCase
{
    public function test_home_responds(): void
    {
        $this->get('/')->assertStatus(200);
    }
}
