<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;

class XssProtectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function xss_payloads_are_sanitized()
    {
        $payload = [
            'name'    => 'Alex',
            'rating'  => 5,
            'comment' => '<script>alert(1)</script> test onerror=alert(2)',
        ];

        $response = $this->postJson('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $response->assertStatus(200);

        $review = Review::first();

        $this->assertStringNotContainsString('<script>', $review->comment);
        $this->assertStringNotContainsString('onerror=', $review->comment);
    }
}
