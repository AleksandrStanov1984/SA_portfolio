<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\Review;

class HtmlInjectionSanitizationTest extends TestCase
{
    /** @test */
    public function html_tags_are_removed_from_reviews()
    {
        $payload = [
            'name'    => 'Alex',
            'rating'  => 5,
            'comment' => '<b>Bold</b>',
        ];

        $response = $this->postJson('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $response->assertStatus(200);

        $review = Review::first();

        $this->assertEquals('Bold', $review->comment);
    }
}
