<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ContactMessage;

class ContactMessageModelTest extends TestCase
{
    /** @test */
    public function it_creates_model()
    {
        $msg = new ContactMessage([
            'name' => 'Alex',
            'email'=> 'test@example.com',
            'phone'=> '+4912345678',
            'topic'=> 'General',
            'message' => 'Hello',
            'locale'  => 'de'
        ]);

        $this->assertEquals('Alex', $msg->name);
    }
}
