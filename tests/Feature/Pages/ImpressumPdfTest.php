<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class ImpressumPdfTest extends TestCase
{
    /** @test */
    public function impressum_pdf_can_be_downloaded()
    {
        $response = $this->get('/de/impressum.pdf');

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
    }
}
