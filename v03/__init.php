<?php

/*	meta information
	filename: __init.php
	description: init script for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-11-28
*/

// error reporting
error_reporting(E_ALL);

// constants
const CLASSFILES = [
	// traits
	'Logger' => 'lib/config.php',
	// classes
	'Config' => 'lib/config.php',
];

// autoloading
function __autoload(string $class) {
	if ( ! array_key_exists($class,CLASSFILES) ) { return NULL; }
	$classfile = CLASSFILES[$class];
	if ( ! is_file($classfile) or ! is_readable($classfile) ) { return NULL; }
	require_once($classfile);
}
spl_autoload_register('__autoload');

?>