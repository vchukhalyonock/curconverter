<?php

namespace App\Interfaces;

/**
 * Interface IProvider
 * @package App\Interfaces
 */
interface IProvider {

    /**
     * Should return rate using API with current provider
     * @param $currency1
     * @param $currency2
     * @return mixed
     */
    public function getRate($currency1, $currency2);
}