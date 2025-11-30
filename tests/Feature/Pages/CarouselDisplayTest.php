<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class CarouselDisplayTest extends TestCase
{
    /** @test */
    public function projects_grid_is_rendered()
    {
        $response = $this->get('/de');

        $response->assertStatus(200);

        // Сама сетка
        $response->assertSee('card-grid', false);

        // Должен быть хотя бы один проект
        $response->assertSee('project', false);

        // Модалки
        $response->assertSee('project-modal-backdrop', false);
        $response->assertSee('project-modal-panel', false);
    }
}
