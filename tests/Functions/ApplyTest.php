<?php

use FunkyPhp\Functions\Apply;
use PHPUnit\Framework\TestCase;

final class ApplyTest extends TestCase {
    public function testApply() {
        $func = function($a) { return $a; };
        $this->assertEquals(42, Apply::run($func, [42]));
    }
}
