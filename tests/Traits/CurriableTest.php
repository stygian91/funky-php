<?php

use FunkyPhp\Functions\Identity;
use PHPUnit\Framework\TestCase;

final class CurriableTest extends TestCase {
    public function testCurriable() {
        $curriedId = Identity::curried();
        $this->assertTrue(is_a($curriedId, Closure::class));
        $this->assertEquals(42, $curriedId(42));
    }
}
