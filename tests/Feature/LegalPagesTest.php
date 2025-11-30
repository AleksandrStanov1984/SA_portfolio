<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    /** @test */
    public function impressum_page_renders()
    {
        $response = $this->get('/de/impressum');

        $response->assertStatus(200);
        $response->assertSee('page-legal-card', false);
        $response->assertSee('lang-switch', false);
        $response->assertSee('legal-back-btn', false);
    }

    /** @test */
    public function datenschutz_page_renders()
    {
        $response = $this->get('/de/datenschutz');

        $response->assertStatus(200);
        $response->assertSee('page-legal-card', false);
        $response->assertSee('lang-switch', false);
        $response->assertSee('legal-back-btn', false);
    }
}
