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

// config
require_once('inc/config.php');
$config = new Config();
# $config->loglevel = 63 -4;
$_SESSION['config'] = $config;

// site
require_once('inc/site.php');
$site = new Site();
$_SESSION['site'] = $site;

// skin
require_once("$site->skindir/index.php");

?>
