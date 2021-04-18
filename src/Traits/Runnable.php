<?php

namespace FunkyPhp\Traits;

trait Runnable {
    protected static function _run1($a) {
        return (new self())($a);
    }

    protected static function _run2($a, $b) {
        return (new self())($a, $b);
    }

    protected static function _runVararg(...$args) {
        return call_user_func_array(new self, $args);
    }
}
