<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Curriable;
use FunkyPhp\Traits\Runnable;

class Identity {
    use Curriable, Runnable;

    public function __invoke($a) {
        return $a;
    }

    public static function run($a) {
        return static::_run1($a);
    }
}