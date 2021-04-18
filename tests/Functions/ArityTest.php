<?php

use FunkyPhp\Functions\Arity;
use FunkyPhp\Functions\Placeholder;
use PHPUnit\Framework\TestCase;

final class ArityTest extends TestCase {
    public function testArity() {
        $func = function($a = null) { return $a; };

        for ($index = 0; $index <= 10; $index++) {
            $newArityFunc = Arity::run($index, $func);
            $refl = new ReflectionFunction($newArityFunc);
            $this->assertEquals($index, $refl->getNumberOfParameters());
            $args = Placeholder::fill($index, ['testing']);
            $res = call_user_func_array($newArityFunc, $args);

            if ($index > 0) {
                $this->assertEquals('testing', $res);
            } else {
                $this->assertEquals(null, $res);
            }
        }
    }

    public function testArityException() {
        $func = function($a = null) { return $a; };

        $this->expectException(\Exception::class);
        Arity::run(11, $func);
    }
}