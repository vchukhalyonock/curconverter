<?php

namespace App\Providers;

use App\Interfaces\IRequest;

/**
 * Class Openexchangerates
 * Provide openexchangerates.org service
 * @package App\Providers
 */
class Openexchangerates extends Provider {

    const ENDPOINT = 'http://openexchangerates.org/api/latest.json';

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


    private function _getResponse() {
        try {
            $response = $this->_request->getData(
                self::ENDPOINT,
                IRequest::METHOD_GET,
                [
                    "app_id" => getenv('OPENEXCHANGERATES_API_KEY')
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Cannot get RATE:" . $e->getMessage());
        }

        return $response;
    }
}