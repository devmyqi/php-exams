<?php

/*	meta information
	filename: init.php
	description: init script for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-09
	modified: 2019-11-09
	notes: only called once
*/


// reset
$config = Null; $_SESSION = Null;

// config
require_once('inc/config.php');
$config = new Config();
$_SESSION['config'] = $config;

// site

?>
