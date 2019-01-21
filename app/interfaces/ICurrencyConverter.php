<?php

namespace App\Interfaces;

/**
 * Interface ICurrencyConverter
 * @package App\Interfaces
 */
interface ICurrencyConverter {

    /**
     * Should convert currecy value using current provider
     * @param $currency1
     * @param $currency2
     * @param $value1
     * @return mixed
     */
    static function convert($currency1, $currency2, $value1);
}