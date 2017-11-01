<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userApiController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * Rotas para a consulta de valores de domínios
 *
 * 1) http://educatech.dev/api/dominio | GET | Retorna todos os domínios
 * 2) http://educatech.dev/api/dominio/INSTITUICAO.DM_SITUACAO | GET | Retorna
 * 	os valores de um domínio
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

/**
 * Rotas para a consulta de valores de domínios
 *
 * 1) http://educatech.dev/api/cidade | GET | Retornar todas as cidades do
 * 	Brasil
 * 2) http://educatech.dev/api/cidade/$estadoId | GET | Retornar cidades com
 * 	base no ID do estado mencionado
 * 3) http://educatech.dev/api/cidade/$codIbge | GET | Retornar cidades com
 * 	base no código IBGE mencionado
 *
 * @see  https://www.codeigniter.com/userguide3/general/routing.html
 *
 * @author Nicholas Leite <nicklleite@gmail.com>
 * @package application\config
 * @since v0.0.3
 * @version v0.0.3
 */
$route['api/cidade']['get'] = "CidadeApiController/getAll";
$route['api/cidade/([1-27]|1[0-2])']['get'] = "CidadeApiController/getPorEstado/$1";
$route['api/cidade/([0-9]{1,7})']['get'] = "CidadeApiController/getPorCodIbge/$1";

/**
 * Rotas para a consulta de valores de domínios
 *
 * 1) http://educatech.dev/api/cidade | GET | Retornar todos os estados do
 * 	Brasil
 * 2) http://educatech.dev/api/cidade/$codIbge | GET | Retornar cidades do
 * 	estado mencionado
 *
 * @see  https://www.codeigniter.com/userguide3/general/routing.html
 *
 * @author Nicholas Leite <nicklleite@gmail.com>
 * @package application\config
 * @since v0.0.3
 * @version v0.0.3
 */
$route['api/estado']['get'] = "EstadoApiController/getAll";
$route['api/estado/([0-9]{1,2})']['get'] = "EstadoApiController/getPorCodIbge/$1";