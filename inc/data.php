<?php

/*	meta information
	filename: inc/data.php
	description: data classes for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-25
	modified: 2019-10-28
*/

require_once('inc/meta.php');

class Data extends Meta {
	public $files = '';
	public $courses = [];
	public function __construct($config,$files=NULL) {
		$this->config = $config;
		$this->files = $files !== NULL ? $files : $config->files;
		$this->_log(1,"new Data from files: $this->files");
		foreach ( glob($this->files) as $file ) {
			$this->_readData($file);
		}
	}
	// static functions
	static function getID($keys,$topic) {
		preg_match('/^([\w\-]+)\s*\:\s*(.*)\s*$/',$topic,$result);
		if ( ! count($result) ) { $number = count($keys); // no id given
			while ( True ) { $number += 1; $uid = sprintf('_%03d',$number);
				if ( ! in_array($uid,$keys) ) { break; }
			} return array($uid,$topic);
		} else { return array($result[1],$result[2]); }
	}
	// protected functions
	protected function _readData($file) {
		if ( ! is_file($file) or ! is_readable($file) ) {
			$this->_log(2,"unable to read file: $file");
		} $this->_log(2,"reading data from file: $file");
		$answers = []; $questions = []; $courses = []; $markup = [];
		// reverse processing the data file!
		foreach ( array_reverse(file($file)) as $line ) { $line = trim($line);
			if ( preg_match('/^\#{3}\s+(.*)$/',$line,$result) ) { ### answer
				list($aid,$topic) = Data::getID(array_keys($answers),$result[1]);
				$answer = new Answer($this->config,$aid,$topic);
				$answer->markup = implode("\n",array_reverse($markup));
				$answers[$aid] = $answer; $markup = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$line,$result) ) { ## question
				list($qid,$topic) = Data::getID(array_keys($questions),$result[1]);
				$question = new Question($this->config,$qid,$topic);
				$question->answers = array_reverse($answers);
				$question->markup = implode("\n",array_reverse($markup));
				$questions[$qid] = $question; $answers = []; $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$line,$result) ) { # course
				list($cid,$topic) = Data::getID(array_keys($courses),$result[1]);
				$course = new Course($this->config,$cid,$topic);
				$course->questions = array_reverse($questions);
				$course->markup = implode("\n",array_reverse($markup));
				$courses[$cid] = $course; $questions = []; $markup = [];
			} else { $markup[] = $line; }
		} $this->courses = array_reverse($courses);
	}
	// output functions
	public function printTree() {
		$this->_log(2,"printing the data object tree");
		foreach ( $this->courses as $course ) {
			print("* [c] $course->topic\n");
			foreach ( $course->questions as $question ) {
				print("\t* [q] $question->topic\n");
				foreach ( $question->answers as $answer ) {
					print("\t\t* [a] $answer->topic\n");
				} // end printing answers
			} // end printing questions
		} // end printing courses
	}
	public function htmlTree($tag="ol") { $html = "<$tag>\n"; 
		$this->_log(2,"getting the html course tree");
		foreach ( $this->courses as $course ) {
			$html .= "\t<li>$course->topic</li><$tag>\n";
			foreach ( $course->questions as $question ) {
				$html .= "\t\t<li>$question->topic</li><$tag>\n";
				foreach ( $question->answers as $answer ) {
					$html .= "\t\t\t<li>$answer->topic</li>>\n";
				} $html .= "\t\t</$tag>\n";
			} $html .= "\t</$tag>\n";
		} return "$html</$tag>\n";
	}
} // end of class Data

class Course extends Meta {
	public $cid = '';
	public $topic = '';
	public $markup = '';
	public $questions = [];
	public function __construct($config,$cid='',$topic='') {
		$this->config = $config;
		$this->cid = $cid;
		$this->topic = $topic;
		$this->_log(1,"new Course: $topic");
	}
} // end of class Course

class Question extends Meta {
	public $qid = '';
	public $topic = '';
	public $markup = '';
	public $answers = [];
	public function __construct($config,$qid='',$topic='') {
		$this->config = $config;
		$this->qid = $qid;
		$this->topic = $topic;
		$this->_log(2,"new Question: $topic");
	}
} // end of class Question

class Answer extends Meta {
	public $aid = '';
	public $topic = '';
	public $markup = '';
	public $correct = False;
	public function __construct($config,$aid='',$topic='') {
		$this->config = $config;
		$this->aid = $aid;
		$this->topic = $topic;
		$this->_log(4,"new Answer: $topic");
	}
} // end of class Answer

?>