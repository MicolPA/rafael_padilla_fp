<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Las credenciales de producción se guardan fuera de public_html para que
 * los despliegues de Git no las sobrescriban ni se publiquen en el repositorio.
 */
$private_database_file = dirname(rtrim(FCPATH, '/\\')).DIRECTORY_SEPARATOR.'rafael-padilla-database.php';

if ( ! is_file($private_database_file))
{
	throw new RuntimeException('No se encontró la configuración privada de la base de datos.');
}

$private_database = require $private_database_file;

if ( ! is_array($private_database))
{
	throw new RuntimeException('La configuración privada de la base de datos no es válida.');
}

$required_database_keys = array('hostname', 'username', 'password', 'database');
foreach ($required_database_keys as $required_database_key)
{
	if ( ! array_key_exists($required_database_key, $private_database))
	{
		throw new RuntimeException('Falta el valor '.$required_database_key.' en la configuración privada de la base de datos.');
	}
}

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array_merge(array(
	'dsn' => '',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8mb4',
	'dbcollat' => 'utf8mb4_unicode_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
), $private_database);

unset($private_database, $private_database_file, $required_database_keys, $required_database_key);
