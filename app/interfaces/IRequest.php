<?php

namespace Interfaces;

interface IRequest {
    const METHOD_GET = 0;
    const METHOD_POST = 1;

    public function getData($endpoint, $method, array $data = array());
}