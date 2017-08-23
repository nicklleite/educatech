<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    /**
     * init : void
     * 
     * @param debug : boolean - default = FALSE
     * ...
     */
    public function init($print = "", $debug = FALSE) {
        $this->print("Nicholas usando sabe se lá o que!");
    }

    private function testConnection() {

    }

    private function print($var = "EMPTY") {
        echo $var;
    }

}