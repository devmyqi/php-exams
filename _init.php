<?php

/*	meta information
	filename: _init.php
	description: initializing the exams program
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-30
	modified: 2019-10-30
*/

// requires
require_once('config.php');
require_once('inc/data2.php');

// session
session_start();

$_SESSION['config'] = new Config();
$_SESSION['data'] = new Data();

?>
