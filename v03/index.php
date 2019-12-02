<?php

/*	meta information
	filename: v03/index.php
	description: main index for exams
	version; v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-12-02
	modified: 2019-12-02
*/

require_once('__init.php');

// config init
$config = new Config();

// request (controller)
$request = new Request();

// data (model)
$users = new Users();
$data = new Data();

// site (view)

// skin
require_once("$config->skinDir/index.php");

?>
