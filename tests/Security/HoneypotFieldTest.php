<?php

namespace Tests\Security;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ContactMessage;

class HoneypotFieldTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bots_are_blocked_if_hp_secret_filled()
    {
        $payload = [
            'name'    => 'Alex',
            'email'   => 'test@example.com',
            'phone'   => '+4912345678',
            'topic'   => 'Any',
            'message' => 'Hello',
            'hp_secret' => 'bot!', // bot detected
        ];

        $response = $this->postJson('/de/contact/send', $payload);

        // Должно не сохранять, но можно вернуть 200
        $this->assertEquals(0, ContactMessage::count());
    }
}
