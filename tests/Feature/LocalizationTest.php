<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocalizationTest extends TestCase
{
    /** @test */
    public function main_page_has_correct_html_lang_attribute_for_each_locale()
    {
        foreach (['de', 'en', 'ru'] as $locale) {
            $response = $this->get("/{$locale}");

            $response->assertStatus(200);
            $response->assertSee('lang="' . $locale . '"', false);
        }
    }

    /** @test */
    public function legal_pages_exist_for_all_locales()
    {
        foreach (['de', 'en', 'ru'] as $locale) {
            $responseImpressum = $this->get("/{$locale}/impressum");
            $responseDatenschutz = $this->get("/{$locale}/datenschutz");

            $responseImpressum->assertStatus(200);
            $responseImpressum->assertSee('page-legal-card', false);

            $responseDatenschutz->assertStatus(200);
            $responseDatenschutz->assertSee('page-legal-card', false);
        }
    }
}
