<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class DatenschutzPdfTest extends TestCase
{
    /** @test */
    public function datenschutz_pdf_can_be_downloaded()
    {
        $response = $this->get('/de/datenschutz.pdf');

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
}
