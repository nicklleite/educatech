<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

if (ENVIRONMENT == 'development') {
	$hostname = 'localhost';
	$username = 'postgres';
	$password = '102040';
	$database = 'educatech';
} else if (ENVIRONMENT == 'testing') {
	$hostname = 'educatech.postgresql.dbaas.com.br';
	$username = 'educatech';
	$password = 'u@uaI910#';
	$database = 'educatech';
}

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => $username,
	'password' => $password,
	'database' => $database,
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE,
	'port' => '5432'
);
