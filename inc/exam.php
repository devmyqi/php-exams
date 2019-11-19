<?php

/*	meta information
	filename: dev/inc/exam.php
	description: exam class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-15
	modified: 2019-11-18
*/

class Exam {
	protected $defaults = [
		'courses' => [],
		'questions' => [],
		'count' => 20, // number of questions
		'sorting' => 'order', // order, random, etc.
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		} $config->_log(1,"new <Exam> object initialized");
	}
	public function addCourse($cid) { global $config, $courses;
	}
	public function addQuestions($cid) { global $config, $courses;
		if ( ! array_key_exists($cid,$courses->courses) ) {
			return $config->_log(8,"unable to add questions for course: $cid");
		} $config->_log(2,"adding questions to exam for course: $cid");
		$course = $courses->courses[$cid];
		foreach ( $course->questions as $qid => $question ) {
			$cqid = "$question->cid.$question->qid";
			if ( in_array($cqid,$this->questions) ) { continue; }
			$this->questions[] = $cqid;
		}
	}
} // end of class Exam

?>
