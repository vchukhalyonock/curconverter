<?php

namespace App\Providers;

use App\Interfaces\IProvider;
use App\Interfaces\IRequest;

class Fixer implements IProvider {

    const ENDPOINT = 'http://data.fixer.io/api/latest';
    private $_request;

    public function __construct(IRequest $request) {
        $this->_request = $request;
    }

    public function getRate($currency1, $currency2) {
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

        var_dump($response);

        return $response;
    }
}