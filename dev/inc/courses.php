<?php

/*	meta information
	filename: dev/inc/courses.php
	description: course classes for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-15
	notes: classes copied from inc/courses.php
*/

class Courses {
	public $datafiles = '';
	public $read = False;
	public $courses = [];
	public function __construct() { global $config;
		$this->datafiles = "$config->datadir/$config->files";
		$config->_log(1,"new Courses with files: $this->datafiles");
		$this->getCourses();
	}
	public function getCourses() { global $config;
		$datafiles = glob($this->datafiles);
		if ( ! count($datafiles) ) {
			$config->_log(8,"no datafiles to get courses in: $this->datafiles");
		} foreach ( $datafiles as $datafile ) { $this->readCourses($datafile); }
	}
	public function readCourses($datafile) { global $config;
		if ( ! is_readable($datafile) or ! is_file($datafile) ) {
			$config->_log(8,"unable to read courses from: $datafile");
		} $config->_log(2,"reading courses from file: $datafile");
		$courses = $this->courses; $questions = $answers = $markup = [];
		foreach ( array_reverse(file($datafile)) as $dataline ) { // reverse processing
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

class Course {
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

class Question {
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

class Answer {
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
