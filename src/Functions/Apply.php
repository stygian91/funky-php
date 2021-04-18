<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Runnable;

class Apply {
    use Runnable;

    public function __invoke($func, $args) {
        return call_user_func_array($func, $args);
    }

    public static function run($func, $args) {
        return static::_run2($func, $args);
    }
}
