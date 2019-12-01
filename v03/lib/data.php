<?php

// vim-marks: d=Data,b=Base,c=Couse,q=Question,a=Answer

/*	meta information
	filename: v03/lib/data.php
	description: data classes for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-11-29
*/

class Data {
	// class members
	static private $filesRead = FALSE;
	static private $courses = [];
	// magic methods
	public function __construct(array $data=[]) { global $config;
		$config->_log(1,"new Data with files: $config->dataFiles");
		$this->base = new Base();
		if ( self::$filesRead === FALSE ) {
			$this->readFiles($config->dataFiles);
		}
	}
	private function readFiles($dataFiles) { global $config;
		$courseFiles = glob($dataFiles);
		if ( empty($courseFiles) ) {
			return $config->_log(8,"there are no course files in: $dataFiles");
		} foreach ( $courseFiles as $courseFile ) { $this->readCourses($courseFile); }
	}
	private function readCourses(string $courseFile) { global $config;
		// reverse processing
		if ( ! is_file($courseFile) or ! is_readable($courseFile) ) {
			$config->_log(8,"unable to read courses from: $courseFile");
		} $config->_log(2,"reading courses from file: $courseFile");
		$answers = []; $questions = []; $markupLines = [];
		foreach ( array_reverse(file($courseFile)) as $dataLine ) {
			$dataLine = rtrim($dataLine);
			if ( preg_match('/^\#{3}\s+(.*)$/',$dataLine,$result) ) { // answer
				$answer = new Answer($result[1]);
				$answer->markup = trim(implode("\n",array_reverse($markupLines)));
				$answers[$answer->aid] = $answer; $markupLines = [];
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$dataLine,$result) ) { // question
				$question = new Question($result[1]);
				$question->markup = trim(implode("\n",array_reverse($markupLines)));
				$question->answers = array_reverse($answers,TRUE);
				$questions[$question->qid] = $question;
				$answers = []; $markupLines = [];
			} elseif ( preg_match('/^\#{1}\s+(.*)$/',$dataLine,$result) ) { // course
				$course = new Course($result[1]);
				$course->markup = trim(implode("\n",array_reverse($markupLines)));
				$course->questions = array_reverse($questions,TRUE);
				self::$courses[$course->cid] = $course;
				$questions = []; $markupLines = [];
			} else { $markupLines[] = $dataLine; }
		}
	}
	// debug methods
	public function printTree() { global $config;
		$config->_log(2,"printing the data tree to <stdout>");
		foreach ( self::$courses as $cid => $course ) {
			print("[C] $course->cid: $course->title\n");
			foreach ( $course->questions as $qid => $question ) {
				print("\t[Q] $question->qid: $question->title\n");
				foreach ( $question->answers as $aid => $answer ) {
					print("\t\t[A] $answer->aid: $answer->title\n");
				}
			}
		}
	}
} // end of class Data

class Base { // sqlite3 database
	public $pdo = False;
	public function __construct() { global $config;
		$config->_log(1,"new <Base> object initialized");
		$this->_connect($config->baseType);
	}
	private function _connect($baseType) { global $config;
		if ( $config->baseType === 'sqlite3' ) {
			$config->_log(2,"connecting to database: $baseType");
		} else {
			return $config->_log(8,"undefined database type to connect: $baseType");
		}
	}
} // end of class Base

class Course {
	static private $defaults = [
		'cid' => '',
		'title' => '',
		'markup' => '',
		'created' => '',
		'owner' => '',
		'keywords' => [],
		'categories' => [],
		'questions' => [],
	];
	// magic methods
	public function __construct(string $dataLine) { global $config;
		foreach ( self::$defaults as $attrib => $value ) { $this->$attrib = $value; }
		$this->cid = substr(md5($dataLine),0,$config->dataHashLength);
		if ( ! empty($dataLine) ) { $this->parseData($dataLine); }
		$config->_log(1,"new Course object initialized: $this->cid");
		# print_r($this);
	}
	protected function parseData(string $dataLine) { $title = '';
		foreach ( preg_split('/\s+/',$dataLine) as $word ) {
			if ( preg_match('/^([\w\-\.]+)\:$/',$word,$result) ) {
				$this->cid = $result[1];
			} elseif ( preg_match('/^\>([\w\-\.]+)$/',$word,$result) ) {
				$this->created = $result[1];
			} elseif ( preg_match('/^\?([\w\-\.]+)$/',$word,$result) ) {
				$this->owner = $result[1];
			} elseif ( preg_match('/^\#([\w\-\.]+)$/',$word,$result) ) {
				if ( ! in_array($result[1],$this->keywords) ) {
					$this->keywords[] = $result[1];
				}
			} elseif ( preg_match('/^\@([\w\-\.]+)$/',$word,$result) ) {
				if ( ! in_array($result[1],$this->categories) ) {
					$this->categories[] = $result[1];
				}
			} else { $title = trim("$title $word"); }
		} $this->title = $title;
	}
} // end of class Course

class Question {
	static private $defaults = [
		'qid' => '',
		'title' => '',
		'markup' => '',
		'created' => '',
		'owner' => '',
		'keywords' => [],
		'categories' => [],
		'answers' => [],
	];
	public function __construct(string $dataLine) { global $config;
		foreach ( self::$defaults as $attrib => $value ) { $this->$attrib = $value; }
		$this->qid = substr(md5($dataLine),0,$config->dataHashLength);
		if ( ! empty($dataLine) ) { $this->parseData($dataLine); }
		$config->_log(2,'new Question initialized');
	}
	protected function parseData(string $dataLine) { $title = '';
		foreach ( preg_split('/\s+/',$dataLine) as $word ) {
			if ( preg_match('/^([\w\-\.]+)\:$/',$word,$result) ) {
				$this->cid = $result[1];
			} elseif ( preg_match('/^\>([\w\-\.]+)$/',$word,$result) ) {
				$this->created = $result[1];
			} elseif ( preg_match('/^\?([\w\-\.]+)$/',$word,$result) ) {
				$this->owner = $result[1];
			} elseif ( preg_match('/^\#([\w\-\.]+)$/',$word,$result) ) {
				if ( ! in_array($result[1],$this->keywords) ) {
					$this->keywords[] = $result[1];
				}
			} elseif ( preg_match('/^\@([\w\-\.]+)$/',$word,$result) ) {
				if ( ! in_array($result[1],$this->categories) ) {
					$this->categories[] = $result[1];
				}
			} else { $title = trim("$title $word"); }
		} $this->title = $title;
	}
} // end of class Question

class Answer {
	static private $defaults = [
		'aid' => '',
		'title' => '',
		'markup' => '',
		'correct' => FALSE,
	];
	public function __construct(string $dataLine) { global $config;
		foreach ( self::$defaults as $attrib => $value ) { $this->$attrib = $value; }
		$this->aid = substr(md5($dataLine),0,$config->dataHashLength);
		if ( ! empty($dataLine) ) { $this->parseData($dataLine); }
		$config->_log(4,"new Anwer object initialized");
	}
	protected function parseData(string $dataLine) {
		if ( preg_match('/^(.*)\!$/',$dataLine,$result) ) {
			$this->correct = TRUE; $dataLine = $result[1];
		} $title = '';
		foreach ( preg_split('/\s+/',$dataLine) as $word ) {
			if ( preg_match('/^([\w\-\.]+)\:$/',$word,$result) ) {
				$this->aid = $result[1];
			} else { $title = trim("$title $word"); }
		} $this->title = $title;
	}
} // end of class Answer

?>
