<?php

namespace Tests\Feature\Navigation;

use Tests\TestCase;

class ButtonsAndLinksTest extends TestCase
{
    /** @test */
    public function all_main_buttons_and_links_exist_on_main_page()
    {
        $response = $this->get('/de');

        $response->assertStatus(200);

        // Кнопка добавления отзыва (id="openReviewModal")
        $response->assertSee('openReviewModal');

        // Секция contact
        $response->assertSee('id="contact"', false);

        // Языковой переключатель
        $response->assertSee('DE');
        $response->assertSee('EN');
    }
}
