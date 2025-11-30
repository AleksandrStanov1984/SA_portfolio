<?php

namespace Tests\Unit;

use Tests\TestCase;

class HtmlPurifierTest extends TestCase
{
    /** @test */
    public function clean_helper_removes_script_tags()
    {
        if (!function_exists('clean')) {
            $this->markTestSkipped('clean() helper is not available.');
        }

        $input = '<script>alert("xss")</script>Text';
        $clean = clean($input);

        $this->assertStringNotContainsString('<script>', $clean);
        $this->assertStringContainsString('Text', $clean);
    }
}
