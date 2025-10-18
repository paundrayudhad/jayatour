<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_renders(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Perjalanan yang dirancang khusus');
    }
}
