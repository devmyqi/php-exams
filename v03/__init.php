<?php

/*	meta information
	filename: __init.php
	description: init script for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-12-01
*/

// load chain: config,(user),data,(exam),(site)

// error reporting
error_reporting(E_ALL);

// constants
const CLASSFILES = [
	// traits
	'Super' => 'lib/config.php',
	'Logger' => 'lib/config.php',
	// classes
	'Config' => 'lib/config.php',
	// request (controller)
	'Request' => 'lib/request.php',
	// users
	'Users' => 'lib/user.php',
	'User' => 'lib/user.php',
	'Profile' => 'lib/user.php',
	'Settings' => 'lib/user.php',
	// data (model)
	'Data' => 'lib/data.php',
	'Base' => 'lib/data.php',
	'Course' => 'lib/data.php',
	'Question' => 'lib/data.php',
	'Answer' => 'lib/data.php',
	// site (view)
	'Site' => 'lib/site.php',
];

// autoloading
function autoload(string $class) {
	if ( ! array_key_exists($class,CLASSFILES) ) { return NULL; }
	$classfile = CLASSFILES[$class];
	if ( ! is_file($classfile) or ! is_readable($classfile) ) { return NULL; }
	require_once($classfile);
}

spl_autoload_register('autoload');

?>
