<?php

use FunkyPhp\Functions\Compose;
use PHPUnit\Framework\TestCase;

final class ComposeTest extends TestCase {
    public function testCompose() {
        $add2 = function($a) { return $a + 2; };
        $mul2 = function($a) { return $a * 2; };
        $add4 = function($a) { return $a + 4; };
      
        $operation = Compose::run($add2, $mul2, $add4);

        $this->assertEquals(12, $operation(1));
    }
    
    public function testComposeWithoutArgs() {
        $this->expectException(\Exception::class);
        Compose::run();
    }
}
