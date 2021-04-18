<?php

use PHPUnit\Framework\TestCase;
use FunkyPhp\Functions\Placeholder;

final class PlaceholderTest extends TestCase {
    public function testPlaceholderFill() {
        $arr = Placeholder::fill(3, []);
        foreach ($arr as $el) {
            $this->assertTrue(is_a($el, Placeholder::class));
        }

        $arr = Placeholder::fill(3, ['test']);
        $this->assertEquals('test', $arr[0]);
        $this->assertTrue(is_a($arr[1], Placeholder::class));
        $this->assertTrue(is_a($arr[2], Placeholder::class));

        $arr = Placeholder::fill(3, [0, 1, 2]);
        foreach ($arr as $key => $value) {
            $this->assertEquals($key, $value); 
        }
    }
}
