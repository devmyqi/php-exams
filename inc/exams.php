<?php

/*	meta information
	filename: inc/exams.php
	description: exams - test your knowledge
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-25
	modified: 2019-10-25
*/

require_once('inc/meta.php');

class App extends Meta {
	protected $name = 'exams';
	protected $version = 'v0.0.1';
	protected $directory = 'data';
	protected $files = 'data/*.md';
	public function __construct() {
		$this->_log(1,'new <App> object initialized');
		foreach ( glob($this->files) as $file ) { $this->_readFile($file); }
	}
	public function getVersion() {
		$this->_log(2,'getting the apps version number');
		return "$this->name $this->version";
	}
	protected function _readFile($file) {
		if ( ! file_exists($file) || ! is_readable($file) ) {
			return $this->_log(8,"unable to read data file: $file");
		} $this->_log(2,"reading data from file: $file");
		foreach ( file($file) as $line ) {
			echo $line;
		}
	}
} // end of class App

class Course extends Meta {
	protected $title = '';
	protected $description = '';
	protected $questions = [];
	public function __construct() {
		$this->_log(1,'new <Course> object initialized');
	}
} // end of class Course

class Question extends Meta {
	protected $text = '';
	protected $answers = [];
	public function __construct() {
		$this->_log(4,'new <Question> object initialized');
	}
} // end of class Question

class Answer extends Meta {
	protected $text = '';
	public function __construct() {
		$this->_log(4,'new <Answer> object initialized');
	}
} // end of class Answer

$app = new App();

echo $app->getVersion();

?>