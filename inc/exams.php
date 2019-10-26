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

class App extends Meta {
	protected $name = 'exams';
	protected $version = 'v0.0.1';
	public function __construct() {
		$this->_log(1,'new <App> object initialized');
		foreach ( glob($this->files) as $file ) { $this->_readFile($file); }
	}
	public function getVersion() {
		$this->_log(2,'getting the apps version number');
		return "$this->name $this->version";
	}
} // end of class App

class Data extends Meta {
	protected $files = 'data/*.md';
	protected $courses = [];
	public function __construct($files='data/*.md') {
		$this->files = $files;
		$this->_log(1,"new Data with: $files");
		foreach ( glob($this->files) as $file ) {
			$this->_readCourses($file);
		}
		// echo '>>> courses: ',count($this->courses), "\n";
	}
	protected function _readCourses($file) {
		if ( ! file_exists($file) || ! is_readable($file) ) {
			return $this->_log(8,"unable to read courses from: $file");
		} $this->_log(2,"reading courses from file: $file");
		// resetting objects and values
		$course = NULL; $question = NULL;
		$active = NULL; // course,question,answer
		$markup = '';
		// object expressions
		$courseMatch = '/^\#\s+(.*)\s*$/';
		$questionMatch = '/^\#\#\s+(.*)\s*$/';
		$answerMatch = '/^\#\#\#\s+(.*)\s*$/';
		foreach ( file($file) as $line ) { $line = trim($line);
			// data line with a # course
			if ( preg_match($courseMatch,$line,$match) ) {
				if ( $course !== NULL ) { $this->courses[] = $course; $markup = ''; }
				$course = $this->_getCourse($match[1]);
				if ( $course === NULL ) { $course = new Course($match[1]); }
				$active = 'course'; $markup = '';
			// data line with a ## question
			} elseif ( preg_match($questionMatch,$line,$match) ) {
				if ( $course !== NULL && $active === 'course' ) {
					$course->setMarkup($markup); $markup = '';
				}
				if ( $course !== NULL ) {
					if ( $question  !== NULL ) {
						$course->questions[] = $question; $markup = '';
					}
					$question = $course->_getQuestion($match[1]);
					if ( $question === NULL ) {
						$question = new Question($match[1]);
					}
				}
				$active = 'question'; $markup = '';
				// $markup = '';
				// $active = 'question'; // ## question
			// data line with a ### answer
			} elseif ( preg_match($answerMatch,$line,$match) ) {
				// $active = 'answer'; // ### answer
				$active = 'answer'; $markup = '';
			// adding markup to # course
			} elseif ( $active == 'course' ) { $markup .= $line . "\n";
			// following items
			} else {
				echo ">>> skip: " . trim($line) . "\n";
			}
		}
		// echo ">> done\n"; print_r($course);
		// save the last read course
		if ( $course !== NULL ) { $this->courses[] = $course; }
	}
	public function _getCourse($topic) {
		if ( ! count($this->courses) ) { return NULL;
		} elseif ( is_int($topic) && array_key_exists($topic,$this->courses) ) {
			return $this->courses[$topic];
		}
		foreach ( $this->courses as $course ) {
			if ( $course->topic == $topic ) { return $course; }
		} return NULL;
	}
	public function printCourses() {
		$this->_log(2,'printing the list of courses');
		foreach ( $this->courses as $course ) {
			printf("::: %s (%s)\n",$course->title,strlen($course->description));
			print $course->description."\n";
			// echo "$course->title";
			// print_r($course->title);
		}
	}
	public function printTree() {
		$this->_log(2,'printing the complete data tree');
		foreach ( $this->courses as $course ) {
			print("* $course->topic\n");
			foreach ( $course->questions as $question ) {
				print("\t* $question->topic\n");
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
	public function setMarkup($markup) {
		$this->_log(32,"setting the course markup");
		$this->markup = $markup;
	}
	public function _getQuestion($topic) {
		if ( ! count($this->questions) ) { return NULL;
		} elseif ( is_int($topic) && array_key_exists($topic,$this->questions) ) {
			return $this->questions[$topic];
		}
		foreach ( $this->questions as $question ) {
			if ( $question->topic == $topic ) { return $question; }
		} return NULL;
	}
} // end of class Course

class Question extends Meta {
	public $topic = '';
	protected $markup = '';
	protected $answers = [];
	public function __construct($topic) {
		$this->topic = $topic;
		$this->_log(4,"new Question: $topic");
	}
} // end of class Question

class Answer extends Meta {
	public $topic = '';
	protected $markup = '';
	public function __construct($topic) {
		$this->topic = $topic;
		$this->_log(4,"new Answer: $topic");
	}
} // end of class Answer

// $app = new App(); echo $app->getVersion();

$data = new Data();
$data->printTree();
# var_dump($data->_getCourse(NULL));
?>
