<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Runnable;

class Curry {
    use Runnable;

    public function __invoke(callable $func) {
        $closure = \Closure::fromCallable($func);
        $refl = new \ReflectionFunction($closure);
        $n = $refl->getNumberOfParameters();
        return static::curryN($n, [], $closure);
    }

    protected static function curryN($length, $received, $func) {
        return function() use ($length, $received, $func) {
            $args = func_get_args();
            $combined = [];
            $argsIdx = 0;
            $left = $length;
            $combinedIdx = 0;

            while ($combinedIdx < count($received) || $argsIdx < count($args)) {
                if (
                    $combinedIdx < count($received)
                    && (!is_a($received[$combinedIdx], Placeholder::class) || $argsIdx >= count($args))
                ) {
                    $arg = $received[$combinedIdx];
                } else {
                    $arg = $args[$argsIdx++];
                }

                if (!is_a($arg, Placeholder::class)) {
                    $left--;
                }

                $combined[$combinedIdx++] = $arg;
            }

            if ($left <= 0) {
                return call_user_func_array($func, $combined);
            }

            return Arity::run($left, static::curryN($length, $combined, $func));
        };
    }

    public static function run($func) {
        return static::_run1($func);
    }
}
