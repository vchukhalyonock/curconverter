<?php

namespace App\Providers;

use App\Interfaces\IRequest;
use App\Interfaces\IProvider;

abstract class Provider implements IProvider {
    protected $_request;

    public function __construct(IRequest $request) {
        $this->_request = $request;
    }
}