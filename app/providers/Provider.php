<?php

namespace App\Providers;

use App\Interfaces\IRequest;
use App\Interfaces\IProvider;

/**
 * Class Provider
 * @package App\Providers
 */
abstract class Provider implements IProvider {

    /**
     * @var IRequest
     */
    protected $_request;

    /**
     * Provider constructor.
     * @param IRequest $request
     */
    public function __construct(IRequest $request) {
        $this->_request = $request;
    }
}