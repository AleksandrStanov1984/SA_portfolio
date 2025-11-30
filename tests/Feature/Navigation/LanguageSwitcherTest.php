<?php

namespace Tests\Feature\Navigation;

use Tests\TestCase;

class LanguageSwitcherTest extends TestCase
{
    /** @test */
    public function legal_pages_have_language_switcher()
    {
        foreach (['de','en','ru'] as $locale) {
            $response = $this->get("/$locale/impressum");
            $response->assertStatus(200);

            $response->assertSee('lang-switch', false);
            $response->assertSee('DE');
            $response->assertSee('EN');
            $response->assertSee('RU');
        }
    }
}
