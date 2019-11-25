<?php

/*	meta information
	filename: inc/model.php
	description: new model test for exams
	version: v0.0.2 (alpha2,test)
	author: Michael Wronna, Konstanz
	created: 2019-11-21
	modified: 2019-11-21
*/

require_once('inc/config.php');

$config = new Config(['logtarget'=>'terminal']);

class Data {
	public $datafile = '../data/test/test1.md';
	public function __construct() { global $config;
		$config->_log(1,"new <Data> object initialized");
	}
	
} // end of class Data

class Course {
} // end of class Course

class Question {
} // end of class Question

class Answer {
} // end of class Answer

$data = new Data();

print_r($data);
# print_r($config);

?>
