<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class AccordionDisplayTest extends TestCase
{
    /** @test */
    public function reviews_section_contains_accordion()
    {
        $response = $this->get('/de');

        $response->assertStatus(200);

        // Единственный аккордеон — в блоке отзывов
        $response->assertSee('id="reviewsAccordion"', false);
        $response->assertSee('accordion-card', false);
    }
}
