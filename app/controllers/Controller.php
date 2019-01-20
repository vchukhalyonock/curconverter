<?php

namespace App\Controllers;

use App\Interfaces\IController;


abstract class Controller implements IController {

    public function __construct() {
        $this->_router();
    }

    private function _router() {
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            return $this->ajax();
        } else {
            return $this->index();
        }
    }

    protected function jsonResponse($data) {
        header('Content-type: application/json');
        echo json_encode( $data );
    }

    protected function htmlResponse($html) {
        header('Content-type: text/html');
        echo $html;
    }

    public function index() {

    }

    public function ajax() {

    }
}