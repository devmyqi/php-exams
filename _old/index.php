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
# $_SESSION = Null;

// session_destroy();

// config
require_once('inc/config.php');
session_start();
$config = new Config();

// site
require_once('inc/site.php');
$site = new Site();
$_SESSION['site'] = $site;

// skin
require_once("$site->skindir/index.php");

/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
*/

?>
