<?php
/*	meta information
	filename: index.php
	description: web index for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-08
	modified: 2019-11-11
*/
	

// unset($_SESSION['site']);
// unset($_SESSION['config']);

session_start();
// session_destroy();

// config
require_once('inc/config.php');
if ( ! isset($_SESSION['config']) ) {
	$config = new Config();
	$_SESSION['config'] = serialize($config);
} else { $config = unserialize($_SESSION['config']); }

// site
require_once('inc/site.php');
if ( ! isset($_SESSION['site']) ) {
	$site = new Site();
	$_SESSION['site'] = serialize($site);
} else { $site = unserialize($_SESSION['site']); }

// skin
require_once("$site->skindir/index.php");

/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/

?>
