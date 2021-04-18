<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Runnable;

class Compose {
    use Runnable;

    public function __invoke(...$functions) {
        $funcs = array_reverse($functions);
        return Pipe::run(...$funcs);
    }

    public static function run(...$functions) {
        return static::_runVararg(...$functions);
    }
}
