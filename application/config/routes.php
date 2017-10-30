<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userApiController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --
$route['api/usuario'] = "UserApiController/index";

/**
 * Rotas para a consulta de valores de domínios
 */
$route['api/dominio']['get'] = "DominioApiController/getAll";
$route['api/dominio/([a-zA-Z-_]+(.)[a-zA-Z-_]+)']['get'] = "DominioApiController/getByDominio/$1";
$route['api/dominio']['post'] = "DominioApiController/post";
$route['api/dominio']['patch'] = "DominioApiController/patch";
$route['api/dominio']['delete'] = "DominioApiController/delete";

$route['api/dominio/todos'] = "DominioApiController/buscarTodos";
$route['api/dominio/por-descr/(:any)'] = "DominioApiController/buscarPorDescr/$1";