<?php
session_start();

$GLOBALS['config'] = array(
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
		)
);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});