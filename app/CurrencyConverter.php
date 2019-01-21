<?php

namespace App;

use App\Services\CourseImportAdapter;
use App\Interfaces\ICurrencyConverter;

/**
 * Class CurrencyConverter
 * @package App
 */
class CurrencyConverter implements ICurrencyConverter {

    /**
     * @param $currency1
     * @param $currency2
     * @param $value1
     * @return array
     */
    static function convert($currency1, $currency2, $value1) {
        $response = [
            "error" => null,
            "result" => 0
        ];
        try {
            $provider = CourseImportAdapter::getProvider(getenv('RATE_PROVIDER'));
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
            return $response;
        }

        try {
            $rate = $provider->getRate($currency1, $currency2);
        } catch (\Exception $e) {
            $response['error'] = $e->getMessage();
            return $response;
        }

        $response['result'] = $rate * $value1;

        return $response;
    }
}