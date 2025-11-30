<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class PortfolioPageTest extends TestCase
{
    /** @test */
    public function portfolio_page_loads_for_all_locales()
    {
        foreach (['de','en','ru'] as $locale) {
            $response = $this->get("/$locale");
            $response->assertStatus(200);

            // Hero title
            $response->assertSee(env('MY_NAME'));
            $response->assertSee(__('portfolio.hero_title', [], $locale));

            // Projects section
            $response->assertSee('id="projects"', false);

            // Reviews section
            $response->assertSee('id="reviews"', false);

            // Contact section
            $response->assertSee('id="contact"', false);
        }
    }
}
