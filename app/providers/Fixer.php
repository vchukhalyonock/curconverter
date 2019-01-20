<?php

namespace App\Providers;

use App\Interfaces\IRequest;

class Fixer extends Provider {

    const ENDPOINT = 'http://data.fixer.io/api/latest';

    public function getRate($currency1, $currency2) {
        $currency1Rate = 0;
        $currency2Rate = 0;

        try {
            $response = $this->_getResponse($currency1, $currency2);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        $decodedResponse = json_decode($response, true);
        if($decodedResponse) {
            foreach ($decodedResponse['rates'] as $key => $rate) {
                if($key == $currency1)
                    $currency1Rate = $rate;
                if($key == $currency2)
                    $currency2Rate = $rate;
            }

            return $currency2Rate / $currency1Rate;
        } else {
            return 0;
        }
    }


    private function _getResponse($currency1, $currency2) {
        try {
            $response = $this->_request->getData(
                self::ENDPOINT,
                IRequest::METHOD_GET,
                [
                    "access_key" => getenv('FIXER_API_KEY'),
                    "symbols" => $currency1 . "," . $currency2
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Cannot get RATE:" . $e->getMessage());
        }

        return $response;
    }
}