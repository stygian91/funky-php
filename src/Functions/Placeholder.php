<?php

namespace FunkyPhp\Functions;

class Placeholder {
    public static function fill($n, $array) {
        $arrCount = count($array);
        if ($arrCount >= $n) {
            return $array;
        }

        return array_merge(
            $array,
            array_fill($arrCount, $n - $arrCount, new self())
        );
    }
}