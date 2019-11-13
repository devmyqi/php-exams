<?php

/*	meta information
	filename: dev/new.php
	description: new approach, tests
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-12
*/

session_start();

// requires
require_once('inc/config.php');
require_once('inc/site.php');

// config, init one, use global
$config = new Config(['logtarget'=>'terminal']);
global $config; // not needed, just a hint

// site, stores all data objects
if ( ! isset($_SESSION['site']) ) {
	$site = new Site(); $_SESSION['site'] = $site;
} else { $site = $_SESSION['site']; }



?>
