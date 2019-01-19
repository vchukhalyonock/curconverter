<?php

namespace Services;

use Curl\Curl;
use Interfaces\IRequest;

/**
 * Class Request
 * @package Services
 */
class Request implements IRequest {

    /**
     * @var Curl|null
     */
    private $_curl = null;

    /**
     * Request constructor.
     */
    public function __construct() {
        $this->_curl = new Curl();
    }

    /**
     * @param $endpoint
     * @param $method
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function getData($endpoint, $method, array $data = array()) {
        switch ($endpoint) {
            case self::METHOD_GET:
            default:
                $this->_get($endpoint, $data);
                break;

            case self::METHOD_POST:
                $this->_post($endpoint, $data);
                break;
        }

        if ($this->_curl->error) {
            throw new \Exception("Error requesting resource: "
                . $endpoint
                . " with code "
                . $this->_curl->error_code
                . " And message: " . $this->_curl->error_message);
        }

        return $this->_curl->response;
    }

    /**
     * @param $endpoint
     * @param array $data
     */
    private function _post($endpoint, array $data = array()) {
        $this->_curl->get($endpoint, $data);
    }


    /**
     * @param $endpoint
     * @param array $data
     */
    private function _get($endpoint, array $data = array()) {
        $this->_curl->post($endpoint, $data);
    }
}