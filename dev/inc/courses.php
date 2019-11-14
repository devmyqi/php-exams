<?php

/*	meta information
	filename: dev/inc/courses.php
	description: new approach, course classes
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-14
*/

class Courses {
	public function __construct() { global $config;
		$config->_log(1,'new <Courses> object initialized');
	}
} // end of class Courses

class Course {
} // end of class Course

class Question {
} // end of class Question

class Answer {
} // end of class Answer


?>
