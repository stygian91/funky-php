<?php

use FunkyPhp\Functions\ApplyTo;
use PHPUnit\Framework\TestCase;

final class ApplyToTest extends TestCase {
    public function testApplyTo() {
        $this->assertEquals(
            24,
            ApplyTo::run(12, function($a) { return $a * 2; })
        );
    }
}
