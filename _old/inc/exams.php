<?php

/*	meta information
	filename: dev/inc/exams.php
	description: exams classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-08
	modified: 2019-11-08
*/

// requires config in _SESSION
$config = $_SESSION['config'];

class Exam {
	public $sort = False;
	public $count = 10; // number of questions
	public $questions = [];
	public function __construct() { global $config;
		$config->_log(1,'new <Exams> object initialized');
	}
} // end of class Exam

class Result {
	public $result = [];
} // end of class Result

?>

