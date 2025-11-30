<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Review;

class ReviewModelTest extends TestCase
{
    /** @test */
    public function it_fills_fields()
    {
        $review = new Review([
            'name'    => 'Client',
            'rating'  => 5,
            'comment' => 'Perfect',
            'locale'  => 'de',
            'approved'=> true,
        ]);

        $this->assertEquals('Client', $review->name);
        $this->assertEquals(5, $review->rating);
        $this->assertEquals('Perfect', $review->comment);
        $this->assertEquals('de', $review->locale);
        $this->assertEquals(1, $review->approved);
    }
}
