<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userApiController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * Rotas para a consulta de valores de domínios
 *
 * 1) http://educatech.dev/api/dominio | GET
 * 2) http://educatech.dev/api/dominio/INSTITUICAO.DM_SITUACAO | GET
 * 3) http://educatech.dev/api/dominio | POST
 * 4) http://educatech.dev/api/dominio | PATCH
 * 5) http://educatech.dev/api/dominio | DELETE
 *
 * @see  https://www.codeigniter.com/userguide3/general/routing.html
 *
 * @author Nicholas Leite <nicklleite@gmail.com>
 * @package application\config
 * @since v0.0.0
 * @version v0.0.3
 */
$route['api/dominio']['get'] = "DominioApiController/getAll";
$route['api/dominio/([a-zA-Z-_]+(.)[a-zA-Z-_]+)']['get'] = "DominioApiController/getByDominio/$1";
$route['api/dominio']['post'] = "DominioApiController/post";
$route['api/dominio']['patch'] = "DominioApiController/patch";
$route['api/dominio']['delete'] = "DominioApiController/delete";