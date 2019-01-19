<?php

namespace App\Providers;

use Interfaces\IProvider;
use Interfaces\IRequest;

class Fixer implements IProvider {

    const ENDPOINT = 'http://data.fixer.io/api/';
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
                    "base" => $currency1,
                    "symbols" => $currency2
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Cannot get RATE:" . $e->getMessage());
        }

        return $response;
    }
}