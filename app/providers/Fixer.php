<?php

namespace App\Providers;

use App\Interfaces\IProvider;
use App\Interfaces\IRequest;

class Fixer implements IProvider {

    const ENDPOINT = 'http://data.fixer.io/api/';
    private $_request;

    public function __construct(IRequest $request) {
        $this->_request = $request;
    }

    public function getRate($currency1, $currency2) {
        try {
            $response = $this->_request->getData(
                self::ENDPOINT . '?access_key=' . getenv('FIXER_API_KEY'),
                IRequest::METHOD_GET,
                [
                    "base" => $currency1,
                    "symbols" => $currency2
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Cannot get RATE:" . $e->getMessage());
        }

        var_dump($response);

        return $response;
    }
}