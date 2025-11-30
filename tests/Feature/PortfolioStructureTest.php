<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortfolioStructureTest extends TestCase
{
    /** @test */
    public function main_page_renders_for_all_locales()
    {
        foreach (['de', 'en', 'ru'] as $locale) {
            $response = $this->get("/{$locale}");

            $response->assertStatus(200);

            // HERO
            $response->assertSee(env('MY_NAME'), false);
            $response->assertSee(__('portfolio.hero_title', [], $locale));

            // SKILLS section
            $response->assertSee('id="skills"', false);
            $response->assertSee('skills-carousel', false);
            $response->assertSee('skill-card', false);

            // PROJECTS
            $response->assertSee('id="projects"', false);
            $response->assertSee('project-card', false);

            // EXPERIENCE
            $response->assertSee('id="experience"', false);

            // REVIEWS
            $response->assertSee('id="reviews"', false);
            $response->assertSee('reviewsAccordion', false);

            // CONTACT
            $response->assertSee('id="contact"', false);
        }
    }
}
