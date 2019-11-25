<?php

/*	meta information
	filename: dev/index.php
	description: new approch, index file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-20
	notes: use globals, only data in session!
*/

session_start();

// requires
require_once('inc/config.php');
require_once('inc/request.php');
require_once('inc/users.php');
require_once('inc/courses.php');
require_once('inc/exam.php');
require_once('inc/site.php');

// reset
# session_destroy();
# $_SESSION = Null;

// init once, use global
$config = new Config();
$request = new Request($_GET,$_POST);
// data objects
$users = new Users();
$courses = new Courses();
$exam = new Exam();
// runtime objects
$site = new Site(); // needs all objects

// globals (not needed, just a hint)
global $config, $request, $users, $courses, $exam, $site;

// debugging output
$site->debug = '<h3>debug</h3>';
$site->debug .= "<pre>request: " . json_encode($request,JSON_PRETTY_PRINT) . "</pre>";
$site->debug .= "<pre>post: " . json_encode($_POST,JSON_PRETTY_PRINT) . "</pre>";
$site->debug .= "<pre>session: " . json_encode($_SESSION,JSON_PRETTY_PRINT) . "</pre>";
$site->debug .= "<pre>exam: " . json_encode($exam,JSON_PRETTY_PRINT) . "</pre>";

// load skin
require_once("$config->skindir/index.php");

?>
