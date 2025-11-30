<?php

namespace Tests\Security;

use Tests\TestCase;

class InvalidUtf8PayloadTest extends TestCase
{
    /** @test */
    public function invalid_utf8_payload_is_rejected()
    {
        // Invalid UTF-8 bytes
        $bad = "\xF0\x28\x8C\x28";

        $payload = [
            'name'    => 'Alex',
            'rating'  => 5,
            'comment' => $bad,
        ];

        $response = $this->postJson('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        // Laravel MUST return 422
        $response->assertStatus(422);
    }
}
