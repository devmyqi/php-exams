<?php

/*	meta information
	filename: v03/lib/data.php
	description: data classes for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-11-28
*/

class Data {
	// class members
	static private $filesRead = FALSE;
	static private $courses = [];
	// magic methods
	public function __construct(array $data=[]) { global $config;
		$config->_log(1,"new Data with files: $config->dataFiles");
		if ( self::$filesRead === FALSE ) { $this->readFiles($config->dataFiles); }
	}
	private function readFiles($dataFiles) { global $config;
		$courseFiles = glob($dataFiles);
		if ( empty($courseFiles) ) {
			return $config->_log(8,"there are no course files in: $dataFiles");
		} foreach ( $courseFiles as $courseFile ) { $this->readCourses($courseFile); }
	}
	private function readCourses(string $courseFile) { global $config;
		if ( ! is_file($courseFile) or ! is_readable($courseFile) ) {
			$config->_log(8,"unable to read courses from: $courseFile");
		} $config->_log(2,"reading courses from file: $courseFile");
		$object = FALSE; $markupLines = []; // for setting the markup
		foreach ( file($courseFile) as $dataLine ) {
			$dataLine = rtrim($dataLine);
			if ( preg_match('/^\#{1}\s+(.*)$/',$dataLine,$result) ) { // course
				$course = new Course($result[1]);
				$object = $course;
				self::$courses[$course->cid] = $course;
			} elseif ( preg_match('/^\#{2}\s+(.*)$/',$dataLine,$result) ) { // question
				$question = new Question($result[1]);
				// question
			} elseif ( preg_match('/^\#{3}\s+(.*)$/',$dataLine,$result) ) { // answer
				$answer = new Answer($result[1]);
			} else { $markupLines[] = $dataLine; }
		}
	}
} // end of class Data

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
		print_r($this);
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
		$config->_log(4,"new Anwer object initialized");
	}
} // end of class Answer

?>
