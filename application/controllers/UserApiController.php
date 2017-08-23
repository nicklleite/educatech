<?php defined('BASEPATH') OR exit('No direct script access allowed');

require("ApiController.php");

class UserApiController extends ApiController {

    public function __construct() {
        parent::__construct();

        ApiController::init(TRUE);
    }

    public function index() {
        
    }
}