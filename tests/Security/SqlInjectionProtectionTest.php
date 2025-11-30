<?php

namespace Tests\Security;

use Tests\TestCase;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class SqlInjectionProtectionTest extends TestCase
{
    /** @test */
    public function sql_injection_string_does_not_break_query()
    {
        // 💥 Полная очистка таблицы перед тестом
        DB::table('reviews')->truncate();

        $payload = [
            'name'    => 'Alex',
            'rating'  => 5,
            'comment' => "test'); DROP TABLE reviews; --",
        ];

        $response = $this->postJson('/de/reviews/store', $payload, [
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $response->assertStatus(200);

        // Теперь гарантированно будет == 1
        $this->assertEquals(1, Review::count());
    }
}
