<?php

namespace Tests\Unit;

use Tests\TestCase;

class PdfViewExistenceTest extends TestCase
{
    /** @test */
    public function pdf_views_exist()
    {
        $this->assertTrue(view()->exists('pdf.impressum'));
        $this->assertTrue(view()->exists('pdf.datenschutz'));
    }
}
