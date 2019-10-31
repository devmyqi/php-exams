<?php

/*	meta information
	filename: inc/data2.php
	description: data classes v2 for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-30
	modified: 2019-10-30
	notes: put data into _SESSION
*/

// requires in _init
require_once('inc/parsedown.php');

// get config
$config = isset($_SESSION['config']) ? $_SESSION['config'] : new Config();

class Data {
	public $files = '';
	public $courses = [];
	public function __construct($files=NULL) {
		global $config;
		$this->files = $files !== NULL ? $files : $config->files;
		$config->_log(1,"new Data from files: $this->files");
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
	protected function _readData($file) { global $config;
		if ( ! is_file($file) or ! is_readable($file) ) {
			return $this->_log(2,"unable to read file: $file");
		} $config->_log(2,"reading data from file: $file");
		$answers = []; $questions = []; $courses = []; $markup = [];
		// reverse processing the data file!
		foreach ( array_reverse(file($file)) as $line ) { $line = rtrim($line);
			if ( preg_match('/^\#{3}\s+(.*)$/',$line,$result) ) { ### answer
				list($aid,$topic) = Data::getID(array_keys($answers),$result[1]);
				$answer = new Answer($aid,$topic);
				$answer->markup = implode("\n",array_reverse($markup));
				$answers[$aid] = $answer; $markup = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$line,$result) ) { ## question
				list($qid,$topic) = Data::getID(array_keys($questions),$result[1]);
				$question = new Question($qid,$topic);
				$question->answers = array_reverse($answers);
				# $question->markup = implode("\n",array_reverse($markup));
				$questions[$qid] = $question; $answers = []; $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$line,$result) ) { # course
				list($cid,$topic) = Data::getID(array_keys($courses),$result[1]);
				$course = new Course($cid,$topic);
				$course->questions = array_reverse($questions);
				$course->markup = implode("\n",array_reverse($markup));
				$courses[$cid] = $course; $questions = []; $markup = [];
			} else { $markup[] = $line; }
		} $this->courses = array_merge($this->courses,array_reverse($courses));
	}
	// output functions
	public function printTree() {
		foreach ( $this->courses as $course ) {
			echo "$course->cid: $course->topic\n";
			foreach ( $course->questions as $question ) {
				echo "\t$question->qid: $question->topic\n";
				foreach ( $question->answers as $answer ) {
					echo "\t\t$answer->aid: $answer->topic ($answer->correct)\n";
				} // end looping answers
			} // end looping questions
		} // end looping courses
	}
} // end of class Data

class Course {
	public $cid = '';
	public $topic = '';
	public $markup = '';
	public $questions = [];
	public function __construct($cid,$topic) {
		global $config;
		$this->cid = $cid;
		$this->topic = $topic;
		$config->_log(1,"new Course: $topic");
	}
	public function preview($lines=4) { $parser = new Parsedown();
		$markup = array_slice(explode("\n",trim($this->markup)),0,$lines);
		return $parser->text(implode("\n",$markup));
	}
	public function content() { $parser = new Parsedown();
		return $parser->text(trim($this->markup));
	}
} // end of class Course

class Question {
	public $qid = '';
	public $topic = '';
	public $markup = '';
	public $tags = [];
	public $answers = [];
	public function __construct($qid='',$topic='') {
		global $config;
		$this->qid = $qid;
		$this->topic = $topic;
		$config->_log(2,"new Question: $topic");
	}
} // end of class Question

class Answer {
	public $aid = '';
	public $topic = '';
	public $markup = '';
	public $correct = False;
	public function __construct($aid='',$topic='') {
		global $config;
		$this->config = $config;
		$this->aid = $aid;
		$this->topic = $topic;
		$config->_log(4,"new Answer: $topic");
	}
} // end of class Answer

?>
