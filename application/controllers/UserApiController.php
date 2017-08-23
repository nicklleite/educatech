<?php defined('BASEPATH') OR exit('No direct script access allowed');

require("ApiController.php");

class UserApiController extends ApiController {
    public function index() {
        ApiController::init();
    }
}