<?php

namespace App\Interfaces;

/**
 * Interface ICurrencyConverter
 * @package App\Interfaces
 */
interface ICurrencyConverter {
    static function convert($currency1, $currency2, $value1);
}