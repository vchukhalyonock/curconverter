<?php

namespace App\Controllers;

use App\Interfaces\IController;


/**
 * Class Controller
 * @package App\Controllers
 */
abstract class Controller implements IController {

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->_router();
    }

    /**
     * Simple routing. If it is AJAX request - return JSON, otherwise return index page
     */
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

    /**
     * @param $data
     */
    protected function jsonResponse($data) {
        header('Content-type: application/json');
        echo json_encode( $data );
    }

    /**
     * @param $html
     */
    protected function htmlResponse($html) {
        header('Content-type: text/html');
        echo $html;
    }

    /**
     * Index page
     */
    public function index() {

    }

    /**
     * AJAX response
     */
    public function ajax() {

    }
}