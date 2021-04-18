<?php

namespace FunkyPhp\Traits;

use FunkyPhp\Functions\Curry;

trait Curriable {
    protected static $curriedInstance;

    public static function curried() {
        if ( is_null( static::$curriedInstance ) ) {
            static::$curriedInstance = new self;
        }

        return Curry::run(static::$curriedInstance);
    }
}
