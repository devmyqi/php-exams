<?php

/*	meta information
	filename: inc/courses.php
	description: courses classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-10
*/

// requires config in _SESSION
$config = $_SESSION['config'];

// requires parsedown
require_once('inc/parsedown.php');

# $config->loglevel = 63 - 4; // debug

class Getter {
	public function __get($prop) {
		$object_vars = get_object_vars($this); $class_vars = get_class_vars('Course');
		if ( property_exists($this,$prop) ) { return $this->$prop;
		} elseif ( method_exists($this,$prop) ) { return $this->$prop();
		} elseif ( array_key_exists($prop,$class_vars) ) { return $class_vars[$prop];
		} else { return Null; }
	}
}
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
				$answer->markup = trim(join("\n",$markup));
				$answers[$answer->aid] = $answer;
				$markup = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$dataline,$result) ) { // question
				$question = new Question($result[1]);
				$question->markup = trim(join("\n",$markup));
				$question->addAnswer(array_reverse($answers,True));
				$questions[$question->qid] = $question;
				$answers = $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$dataline,$result) ) { // course
				$course = new Course($result[1]);
				$course->markup = trim(join("\n",$markup));
				$course->addQuestion(array_reverse($questions,True));
				$courses[$course->cid] = $course;
				$questions = $markup = [];
			} else { array_unshift($markup,$dataline); }
		} $this->courselist = array_reverse($courses,True);
	}
} // end of class Courses

class Course extends Getter {
	public $cid = '';
	public $title = '';
	public $markup = '';
	public $questions = [];
	public function __construct($title) { global $config;
		$this->cid = substr(md5($title),0,$config->hashlength);
		if ( preg_match('/^(\w+)\s*\:\s*(.*)$/',$title,$result) ) {
			$this->cid = $result[1]; $this->title = $result[2];
		} else { $this->title = $title; }
		$config->_log(2,"new Course [$this->cid]: $title");
	}
	public function __get($prop) {
		if ( $prop === 'count' ) { return count($this->questions);
		} else { return parent::__get($prop); }
	}
	public function addQuestion($question) { // multiple or single
		if ( is_array($question) ) {
			foreach ( $question as $qid => $singleQ ) {
				$singleQ->cid = $this->cid;
				$this->questions[$qid] = $singleQ;
			}
		} else {
			$question->cid = $this->cid;
			$this->questions[$question->qid] = $question;
		}
	}
	public function preview() { global $config;
		$lines = $config->previewlines; $parsedown = new Parsedown();
		$preview = array_slice(explode("\n",$this->markup),0,$lines);
		return $parsedown->text(implode("\n",$preview));
		print_r($preview);
	}
	public function content() {
		$parsedown = new Parsedown();
		return $parsedown->text($this->markup);
	}
} // end of class Course

class Question extends Getter {
	public $cid = '';
	public $qid = '';
	public $title = '';
	public $markup = '';
	public $answers = [];
	public function __construct($title) { global $config;
		$this->qid = substr(md5($title),0,$config->hashlength);
		$this->title = $title;
		$config->_log(4,"new Question [$this->qid]: $title");
	}
	public function addAnswer($answer) {
		if ( is_array($answer) ) {
			foreach ( $answer as $aid => $singleA ) {
				$singleA->cid = $this->cid;
				$singleA->qid = $this->qid;
				$this->answers[$aid] = $singleA;
			}
		} else {
			$answer->cid = $this->cid;
			$answer->qid = $this->qid;
			$this->answers[$answer->aid] = $answer;
		}
	}
	public function content() {
		$parsedown = new Parsedown();
		return $parsedown->text($this->markup);
	}
} // end of class Question

class Answer extends Getter {
	public $cid = '';
	public $qid = '';
	public $aid = '';
	public $title = '';
	public $markup = '';
	public $correct = False;
	public function __construct($title) { global $config;
		$this->aid = substr(md5($title),0,$config->hashlength);
		if ( preg_match('/^(.*)\s*\!$/',$title,$result) ) {
			$title = $result[1]; $this->correct = True; 
		} $this->title = $title;
		$config->_log(4,"new Answer [$this->aid]: $title");
	}
	public function content() {
		$parsedown = new Parsedown();
		return $parsedown->text($this->markup);
	}
} // end of class Answer

?>
