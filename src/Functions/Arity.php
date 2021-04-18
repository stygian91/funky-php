<?php

namespace FunkyPhp\Functions;

use FunkyPhp\Traits\Runnable;

class Arity
{
    use Runnable;

    public function __invoke($n, $func) {
        switch ($n) {
            case 0:
                return function () use ($func) {
                    return $func();
                };
            case 1:
                return function ($a0) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 2:
                return function ($a0, $a1) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 3:
                return function ($a0, $a1, $a2) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 4:
                return function ($a0, $a1, $a2, $a3) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 5:
                return function ($a0, $a1, $a2, $a3, $a4) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 6:
                return function ($a0, $a1, $a2, $a3, $a4, $a5) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 7:
                return function ($a0, $a1, $a2, $a3, $a4, $a5, $a6) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 8:
                return function ($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 9:
                return function ($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            case 10:
                return function ($a0, $a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9) use ($func) {
                    return call_user_func_array($func, func_get_args());
                };
            default:
                throw new \Exception("First argument to arity must be a non-negative integer no greater than ten");
        }
    }

    public static function run($n, $func) {
        return static::_run2($n, $func);
    }
}
