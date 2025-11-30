<?php

namespace Tests\Feature\Reviews;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Review;

class ReviewPaginationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function reviews_are_paginated()
    {
        Review::factory()->count(20)->create();

        $response = $this->get('/de/reviews/paginated');

        $response->assertStatus(200);
        $response->assertSee('pagination', false);
    }
}
