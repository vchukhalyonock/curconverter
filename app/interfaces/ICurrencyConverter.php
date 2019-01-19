<?php

namespace Interfaces;

/**
 * Interface ICurrencyConverter
 * @package Interfaces
 */
interface ICurrencyConverter {
    static function convert($currency1, $currency2, $value1);
}