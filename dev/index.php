<?php

/*	meta information
	filename: dev/index.php
	description: new approch, index file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-13
	notes: use globals, only data in session!
*/

session_start();

// requires
require_once('inc/config.php');
require_once('inc/request.php');
require_once('inc/site.php');
require_once('inc/users.php');
require_once('inc/courses.php');

// session keys, to avoic conflicts between versions
$sitekey = 'site_v02d';

// reset
# session_destroy();
# $_SESSION = Null;

// init once, use global
$config = new Config();
$request = new Request($_GET,$_POST);
$site = new Site();
$users = new Users();
$courses = new Courses();

// globals (not needed, just a hint)
global $config, $site, $users, $courses;

// load skin
require_once("$config->skindir/index.php");

echo "<pre>", print_r($request,True), "</pre>";

?>
