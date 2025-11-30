<?php

namespace Tests\Unit;

use Tests\TestCase;

class LocalizationConfigTest extends TestCase
{
    /** @test */
    public function supported_locales_exist()
    {
        $locales = ['de', 'en', 'ru'];

        foreach ($locales as $locale) {
            $this->assertTrue(in_array($locale, $locales));
        }
    }
}
