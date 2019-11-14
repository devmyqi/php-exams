<?php

/*	meta information
	filename: dev/test.php
	description: new approach, tests
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-13
*/

session_start();

// requires
require_once('inc/config.php');
require_once('inc/site.php');
require_once('inc/users.php');
require_once('inc/courses.php');

// reset
# session_destroy();
# $_SESSION = Null;

// config, init once, use global
$config = new Config(['logtarget'=>'terminal']);
global $config; // not needed, just a hint

// site, init once, use global
$site = new Site();
global $site; // not needed, just a hint

// users, init once, use global
$users = new Users();
global $users; // not needed, just a hint

// formatting assoc arrays (e.g. _POST)
# $array = ['one'=>'eins','two'=>'zwei','three'=>'drei'];
# $format = '1: $one, 2: $two, 4: $four, 3: $three';
# print_r(Site::_format($array,$format."\n",True));

?>
