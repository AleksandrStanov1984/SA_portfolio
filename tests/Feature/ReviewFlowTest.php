<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewFlowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_submit_review()
    {
        $payload = [
            'name'    => 'Client',
            'comment' => 'Great dev!',
            'rating'  => 5,
        ];

        $response = $this->post('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $response->assertStatus(200);
        $this->assertEquals(1, Review::count());
    }

    /** @test */
    public function reviews_are_paginated()
    {
        Review::factory()->count(20)->create();

        $response = $this->get('/de/reviews/paginated');

        $response->assertStatus(200);

        // просто проверяем success рендер шаблона
        $response->assertSee('pagination', false);
    }
}
