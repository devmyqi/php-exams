<?php

/*	meta information
	filename: inc/data.php
	description: data classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-30
	modified: 2019-10-31
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
	// public functions
	public function getCourses() {
		global $config;
		$config->_log(2,'getting the course list');
		foreach ( glob($this->files) as $file ) {
			$this->_readData($file);
		} return $this->courses;
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
				$question->setMarkup(trim(implode("\n",array_reverse($markup))));

				$question->answers = array_reverse($answers);

				$questions[$qid] = $question; $answers = []; $markup = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$line,$result) ) { # course
				list($cid,$topic) = Data::getID(array_keys($courses),$result[1]);
				$course = new Course($cid,$topic);
				$course->setMarkup(trim(implode("\n",array_reverse($markup))));
				$course->setQuestions(array_reverse($questions));
				$courses[$cid] = $course; $questions = []; $markup = [];
			} else { $markup[] = $line; }
		} $this->courses = array_merge($this->courses,array_reverse($courses));
	}
	// output functions
} // end of class Data

class Course {
	public $cid = '';
	public $topic = '';
	public $preview = '';
	public $content = '';
	public $questions = [];
	public $count = 0;
	public function __construct($cid,$topic) {
		global $config;
		$this->cid = $cid;
		$this->topic = $topic;
		# $this->content = $this->getContent();
		$config->_log(1,"new Course: $topic");
	}
	public function setMarkup($markup,$lines=4) {
		$previewLines = explode("\n",$markup);
		$previewLines = array_slice($previewLines,0,$lines);
		$parser = new Parsedown();
		$this->preview = $parser->text(implode("\n",$previewLines));
		$this->content = $parser->text($markup);
	}
	public function setQuestions($questions) {
		$this->questions = $questions; $this->count = count($questions);
	}
} // end of class Course

class Question {
	public $qid = '';
	public $topic = '';
	public $content = '';
	public $tags = [];
	public $answers = [];
	public $count = 0;
	public function __construct($qid='',$topic='') {
		global $config;
		$this->qid = $qid;
		$this->topic = $topic;
		$config->_log(2,"new Question: $topic");
	}
	public function setMarkup($markup) {
		$parser = new Parsedown();
		$this->content = $parser->text($markup);
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
