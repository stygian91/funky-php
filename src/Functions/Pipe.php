<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Runnable;

class Pipe {
    use Runnable;

    public function __invoke(...$funcs) {
        if (count($funcs) === 0) {
            throw new \Exception("No functions provided.");
        }

        return function(...$args) use ($funcs) {
            $res = call_user_func_array($funcs[0], $args);
            for ($i = 1; $i < count($funcs); $i++) { 
                $res = call_user_func_array($funcs[$i], [$res]);
            }

            return $res;
        };
    }

    public static function run(...$functions) {
        return static::_runVararg(...$functions);
    }
}
