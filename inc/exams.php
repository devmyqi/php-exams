<?php

/*	meta information
	filename: inc/exams.php
	description: exams - test your knowledge
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-25
	modified: 2019-10-26
*/

require_once('inc/meta.php');

class Data extends Meta {
	public $files = '';
	public $courses = [];
	public function __construct($files) {
		$this->files = $files;
		$this->_log(1,"new Data from files: $files");
		foreach ( glob($files) as $file ) {
			$this->_readData($file);
		}
	}
	protected function _getCourse($topic) {
		if ( is_int($topic) and $topic < count($this->courses) ) {
			return $this->courses[$topic];
		} elseif ( ! count($this->courses) ) { return NULL; }
		foreach ( $this->courses as $course ) {
			if ( $course->topic == $topic ) { return $course; }
		} return NULL;
	}
	protected function _readData($file) {
		if ( ! is_file($file) or ! is_readable($file) ) {
			$this->_log(2,"unable to read file: $file");
		} $this->_log(2,"reading data from file: $file");
		$answers = []; $questions = []; $courses = []; $markup = [];
		// reverse processing the data file!
		foreach ( array_reverse(file($file)) as $line ) { $line = trim($line);
			if ( preg_match('/^\#{3}\s+(.*)$/',$line,$result) ) { ### answer
				$answer = new Answer($result[1]);
				$answer->$markup = implode("\n",array_reverse($markup));
				$answers[] = $answer; $markup = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$line,$result) ) { ## question
				$question = new Question($result[1]);
				$question->answers = array_reverse($answers);
				$question->markup = implode("\n",array_reverse($markup));
				$questions[] = $question; $answers = []; $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$line,$result) ) { # course
				$course = new Course($result[1]);
				$course->questions = array_reverse($questions);
				$course->markup = implode("\n",array_reverse($markup));
				$courses[] = $course; $questions = []; $markup = [];
			} else { $markup[] = $line; }
		} $this->courses = array_reverse($courses);
	}
	public function printTree() {
		$this->_log(2,"printing the data object tree");
		foreach ( $this->courses as $course ) {
			print("* [c] $course->topic\n");
			foreach ( $course->questions as $question ) {
				print("\t* [q] $question->topic\n");
				foreach ( $question->answers as $answer ) {
					print("\t\t* [a] $answer->topic\n");
				}
			}
		}
	}
} // end of class Data

class Course extends Meta {
	public $topic = '';
	public $markup = '';
	public $questions = [];
	public function __construct($topic='') {
		$this->topic = $topic;
		$this->_log(1,"new Course: $topic");
	}
} // end of class Course

class Question extends Meta {
	public $topic = '';
	public $markup = '';
	public $answers = [];
	public function __construct($topic='') {
		$this->topic = $topic;
		$this->_log(1,"new Question: $topic");
	}
} // end of class Question

class Answer extends Meta {
	public $topic = '';
	public $markup = '';
	public $correct = False;
	public function __construct($topic='') {
		$this->topic = $topic;
		$this->_log(1,"new Answer: $topic");
	}
} // end of class Answer

$data = new Data('data/exams.md');
$data->printTree();

?>
