<?php

/*	meta information
	filename: dev/inc/courses.php
	description: course classes for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-26
	notes: classes copied from inc/courses.php
*/

require_once('inc/parsedown.php');

class Courses {
	public $datafiles = '';
	public $read = False;
	public $courses = [];
	public $count = 0;
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
		$this->count = count($this->courses);
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
		} $this->courses = array_reverse($courses,True);
	}
	public function getQuestion($cqid) { global $config;
		if ( ! preg_match('/^([\w\d]+)\-([\w\d]+)$/',$cqid,$result) ) {
			return $config->_log(8,"wrong format to get question in courses: $cqid");
		} $cid = $result[1]; $qid = $result[2];
		if ( ! array_key_exists($cid,$this->courses) ) {
			return $config->_log(8,"missing course to get question from: $cid");
		} $course = $this->courses[$cid];
		if ( ! array_key_exists($qid,$course->questions) ) {
			return $config->_log(8,"missing question $qid in course $cid to get");
		} return $course->questions[$qid];
	}
	// debug methods
	public function printTree($level=3) { global $config;
		$config->_log(2,'printing the courses data tree');
		foreach ( $this->courses as $cid => $course ) {
			print("[C] $course->cid: $course->title\n");
			if ( $level <= 1 ) { continue; }
			foreach ( $course->questions as $qid => $question ) {
				print("\t[Q] ($question->cqid) $question->qid: $question->title\n");
				if ( $level <= 2 ) { continue; }
				foreach ( $question->answers as $aid => $answer ) {
					print("\t\t[A] ($answer->cid) $answer->aid: $answer->title\n");
				} // end loop answers
			} // end loop questions
		} // end loop courses
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
	public function content() { $parsedown = new Parsedown();
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
	public function __get($prop) {
		if ( $prop === 'cqid' ) { return "$this->cid-$this->qid";
		} elseif ( $prop === 'previous' ) {
			if ( ! empty($_SESSION['previous']) ) { return $_SESSION['previous'];
			} else { return False; }
		} elseif ( $prop === 'next' ) {
			if ( ! empty($_SESSION['next']) ) { return $_SESSION['next'];
			} else { return False; }
		} elseif ( $prop === 'answered' ) {
			$answers = ! empty($_SESSION['answers']) ? $_SESSION['answers'] : [];
			if ( array_key_exists($this->cqid,$answers) ) { return 'checked';
			} else { return ''; }
		} else { return parent::__get($prop); }
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
	public function content() { $parsedown = new Parsedown();
		return $parsedown->text($this->markup);
	}
	public function isCorrect($selection) { $correct = [];
		foreach ( $this->answers as $answer ) {
			if ( $answer->correct ) { $correct[] = $answer->aid; }
		} if ( empty(array_diff($correct,$selection)) ) { return True; }
		return False;
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
	public function __get($prop) {
		if ( $prop === 'selected' ) {
			$answers = ! empty($_SESSION['answers']) ? $_SESSION['answers'] : [];
			foreach ( $answers as $cqid => $aids) {
				if ( ! preg_match('/\-'.$this->qid.'$/',$cqid) ) { continue; }
				if (in_array($this->aid,$aids) ) { return 'checked'; }
			} return '';
			// return "unsure ($this->cid-$this->qid)";
		} else { return parent::__get($prop); }
	}
	public function content() { $parsedown = new Parsedown();
		return $parsedown->text($this->markup);
	}
} // end of class Answer


?>
