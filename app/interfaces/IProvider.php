<?php

namespace Interfaces;

interface IProvider {
    public function getRate($currency1, $currency2);
}