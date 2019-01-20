<?php

namespace App\Controllers;

use App\CurrencyConverter;

class App extends Controller {

    private $_templatePath;

    public function __construct() {
        $this->_templatePath = __DIR__ . '/../../' . getenv('TEMPLATES_PATH');
        parent::__construct();
    }

    public function ajax() {
        $json = json_decode(file_get_contents('php://input'));
        $result = CurrencyConverter::convert(
            getenv('CURRENCY1'),
            getenv('CURRENCY2'),
            $json->value
        );
        return $this->jsonResponse($result);
    }

    public function index() {
        return $this->htmlResponse(file_get_contents($this->_templatePath . '/index.html'));
    }
}