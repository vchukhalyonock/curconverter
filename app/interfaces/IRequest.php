<?php

namespace App\Interfaces;

/**
 * Interface IRequest
 * @package App\Interfaces
 */
interface IRequest {
    /**
     * HTTP Methods
     */
    const METHOD_GET = 0;
    const METHOD_POST = 1;

    /**
     * Get data using HTTP requests
     * @param $endpoint
     * @param $method
     * @param array $data
     * @return mixed
     */
    public function getData($endpoint, $method, array $data = array());
}