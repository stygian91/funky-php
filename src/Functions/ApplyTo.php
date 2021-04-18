<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Curriable;
use FunkyPhp\Traits\Runnable;

class ApplyTo {
    use Runnable, Curriable;

    public function __invoke($x, $func) {
        return $func($x);
    }

    public static function run($x, $func) {
        return static::_run2($x, $func);
    }
}
