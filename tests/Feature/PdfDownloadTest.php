<?php

namespace Tests\Feature\Pages;

use Tests\TestCase;

class PdfDownloadTest extends TestCase
{
    /** @test */
    public function impressum_pdf_downloads()
    {
        $response = $this->get('/de/impressum.pdf');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    public function datenschutz_pdf_downloads()
    {
        $response = $this->get('/de/datenschutz.pdf');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
