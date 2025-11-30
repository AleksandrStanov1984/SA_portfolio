<?php

namespace Tests\Feature;

use Tests\TestCase;

class NavigationTest extends TestCase
{
    /** @test */
    public function main_buttons_exist()
    {
        $response = $this->get('/de');

        $response->assertStatus(200);

        // Contact button
        $response->assertSee('href="#contact"', false);

        // PDF button
        $response->assertSee('portfolio.pdf', false);
    }
}
