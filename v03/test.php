<?php

/*	meta information
	filename: v03/test.php
	description: test for version v0.0.3
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-11-28
*/

require_once('__init.php');

// config init
$configData = ['logTarget'=>'terminal','description'=>'default configuration set by the program'];
$config = new Config($configData);

# print_r($config);
$config->printConfigs();
echo $config->asJson();

?>