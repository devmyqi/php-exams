<?php

/*	meta information
	filename: v03/test.php
	description: test for version v0.0.3
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-12-02
*/

require_once('__init.php');

// config init
$config = new Config(['logTarget'=>'terminal']);

// request (controller)
$request = new Request();

// data (model)
$users = new Users();
$data = new Data();

// site (view)

/* === tests below === */

// config tests
print_r($config);
# $config->printConfigs();
# echo $config->asJson();

// data tests
# $data->printTree();

// users tests
# $users->printUsers();

?>
