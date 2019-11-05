<?php

/*	meta information
	filename: dev/inc/courses.php
	description: courses classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-05
*/

// requires config in _SESSION
$config = $_SESSION['config'];

// requires parsedown
require_once('../inc/parsedown.php');

# $config->loglevel = 63 - 4; // debug

class Courses {
	public $courselist = [];
	public function __construct() { global $config;
		$config->_log(1,"new Courses from files: $config->coursefiles");
		foreach ( glob($config->coursefiles) as $coursefile ) {
			$this->readCourses($coursefile);
		}
	}
	public function readCourses($coursefile) { global $config;
		if ( ! is_readable($coursefile) or ! is_file($coursefile) ) {
			return $config->_log(8,"unable to read courses from: $coursefile");
		} $config->_log(2,"reading courses from file: $coursefile");
		$courses = $this->courselist; $questions = $answers = $markup = [];
		foreach ( array_reverse(file($coursefile)) as $dataline ) { // reverse processing
			$dataline = trim($dataline);
			if ( preg_match('/^\#{3}\s+(.*)$/',$dataline,$result) ) { // answer
				$answer = new Answer($result[1]);
				$answer->content = trim(join("\n",$markup));
				$answers[$answer->aid] = $answer;
				$markup = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$dataline,$result) ) { // question
				$question = new Question($result[1]);
				$question->content = trim(join("\n",$markup));
				$question->answers = array_reverse($answers,True);
				$questions[$question->qid] = $question;
				$answers = $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$dataline,$result) ) {
				$course = new Course($result[1]);
				$course->content = trim(join("\n",$markup));
				$course->questions = array_reverse($questions,True);
				$courses[$course->cid] = $course;
				$questions = $markup = [];
			} else { array_unshift($markup,$dataline); }
		} $this->courselist = array_reverse($courses,True);
	}
} // end of class Courses

class Course {
	public $cid = '';
	public $title = '';
	public $content = '';
	public $questions = [];
	public function __construct($title) { global $config;
		$this->cid = substr(md5($title),0,$config->hashlength);
		$this->title = $title;
		$config->_log(2,"new Course [$this->cid]: $title");
	}
} // end of class Course

class Question {
	public $qid = '';
	public $title = '';
	public $content = '';
	public $answers = [];
	public function __construct($title) { global $config;
		$this->qid = substr(md5($title),0,$config->hashlength);
		$this->title = $title;
		$config->_log(4,"new Question [$this->qid]: $title");
	}
} // end of class Question

class Answer {
	public $aid = '';
	public $title = '';
	public $content = '';
	public function __construct($title) { global $config;
		$this->aid = substr(md5($title),0,$config->hashlength);
		$this->title = $title;
		$config->_log(4,"new Answer [$this->aid]: $title");
	}
} // end of class Answer

?>