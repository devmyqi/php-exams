<?php

/*	meta information
	filename: dev/test.php
	description: new approach, tests
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-18
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

// initial config settings
$configdata = ['logtarget'=>'terminal','loglevel'=>63-4];
// init once, use global
$config = new Config($configdata);
$request = new Request($_GET,$_POST);
// data objects
$users = new Users();
$courses = new Courses();
$exam = new Exam();
// runtime objects
$site = new Site(); // needs all objects

// formatting assoc arrays (e.g. _POST)
# $array = ['one'=>'eins','two'=>'zwei','three'=>'drei'];
# $format = '1: $one, 2: $two, 4: $four, 3: $three';
# print_r(Site::_format($array,$format."\n",True));

// printing the courses tree
# $courses->printTree();

// exam tests
$exam->addQuestions('4298f6');
$exam->addQuestions('4298f6');

?>
