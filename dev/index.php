<?php
// index.php, init and load skin
	
session_start();

// config
require_once('inc/config.php');
$config = new Config();
$_SESSION['config'] = $config;

// site
require_once('inc/site.php');
$site = new Site();
$_SESSION['site'] = $site;

// skin
require_once("$site->skindir/index.php");

?>
