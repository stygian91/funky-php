<?php

use FunkyPhp\Functions\Identity;
use PHPUnit\Framework\TestCase;

final class IdentityTest extends TestCase {
    public function testIdentity() {
        $this->assertEquals(42, Identity::run(42));
    }
}
