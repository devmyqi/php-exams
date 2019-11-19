<?php

/*	meta information
	filename: dev/index.php
	description: new approch, index file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-17
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

// load skin
require_once("$config->skindir/index.php");

# echo "<pre>", print_r($request,True), "</pre>";
# echo "<pre>", print_r($_SESSION,True), "</pre>";
echo "<pre>", print_r($exam,True), "</pre>";

?>
