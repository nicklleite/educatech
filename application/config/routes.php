<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userApiController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --
$route['api/usuario'] = "UserApiController/index";

$route['api/dominio'] = "DominioApiController/index";
$route['api/dominio/todos'] = "DominioApiController/buscarTodos";
$route['api/dominio/por-descr/(:any)'] = "DominioApiController/buscarPorDescr/$1";