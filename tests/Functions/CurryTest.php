<?php

use PHPUnit\Framework\TestCase;
use FunkyPhp\Functions\Curry;
use FunkyPhp\Functions\Placeholder;

final class CurryTest extends TestCase {
    public static function operation($a, $b, $c) {
        return $a * $b + $c;
    }

    public static function biggerOperation($a, $b, $c, $d) {
        return $a * $b + $c * $d;
    }

    public function testCurry() {
        $pl= new Placeholder();
        $curriedFunc = Curry::run(static::class . '::operation');
        $binaryFunc = $curriedFunc(1);
        $unaryFunc = $curriedFunc(1, 2);
        $this->assertEquals(5, $binaryFunc(2, 3));
        $this->assertEquals(6, $unaryFunc(4));

        $missingSecondArg = $curriedFunc(1, $pl, 3);
        $this->assertEquals(5, $missingSecondArg(2));

        $curriedBigFunc = Curry::run(static::class . '::biggerOperation');
        $missingArgs = $curriedBigFunc(1, $pl, 3);
        $this->assertEquals(14, $missingArgs(2, 4));

        $this->assertEquals(14, $curriedBigFunc(1, 2, 3, 4));

        $result1 = Curry::run(static::class . '::operation');
        $this->assertTrue(is_a($result1, \Closure::class));
      
        $result2 = $result1(1, $pl, $pl);
        $this->assertTrue(is_a($result2, \Closure::class));
      
        $result3 = $result2(2, $pl);
        $this->assertTrue(is_a($result3, \Closure::class));

        $result4 = $result3(3);
        $this->assertEquals(5, $result4);
    }
}
