<?php

namespace Tests\Feature\Reviews;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Review;

class ReviewFormSubmitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function review_can_be_submitted()
    {
        $payload = [
            'name'    => 'Alex',
            'comment' => 'Excellent!',
            'rating'  => 5,
        ];

        $response = $this->post('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertEquals(1, Review::count());

        $review = Review::first();

        $this->assertEquals('Alex', $review->name);
        $this->assertEquals('Excellent!', $review->comment);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('de', $review->locale);

        // Исправленный тест
        $this->assertEquals(1, $review->approved);
    }
}
