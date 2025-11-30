<?php

namespace Tests\Unit;

use Tests\TestCase;

class StripTagsSanitizerTest extends TestCase
{
    /** @test */
    public function strip_tags_removes_html()
    {
        $input = '<b>test</b><img src=x onerror=alert(1)>';
        $this->assertEquals('test', strip_tags($input));
    }
}
