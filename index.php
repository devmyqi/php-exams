<?php
/*	meta information
	filename: index.php
	description: web index for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-08
	modified: 2019-11-08
*/
	
session_start();
unset($_SESSION['site']);

// config
require_once('inc/config.php');
$config = new Config();
$_SESSION['config'] = $config;

// site
require_once('inc/site.php');
if ( ! isset($_SESSION['site']) ) {
	$site = new Site();
	$_SESSION['site'] = $site;
} else { $site = $_SESSION['site']; }

// skin
require_once("$site->skindir/index.php");

?>
