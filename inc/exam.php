<?php

/*	meta information
	filename: dev/inc/exam.php
	description: exam class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-15
	modified: 2019-11-19
*/

class Exam extends Getter {
	protected $defaults = [
		'courses' => [],
		'questions' => [],
		// 'previous' => False,
		// 'current' => False,
		// 'next' => False,
		// 'count' => 20, // number of questions, in config
		// 'sorting' => 'order', // order, random, etc.
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		} $config->_log(1,"new <Exam> object initialized");
	}
	public function __get($prop) {
		if ( $prop === 'courseCount' ) { return count($this->courses);
		} elseif ( $prop === 'questionCount' ) {
			return count($this->questions);
		} elseif ( $prop === 'previous' ) {
			if ( ! empty($_SESSION['previous']) ) {
				return $_SESSION['previous'];
			} else { return Null; }
		} elseif ( $prop == 'next' ) {
			if ( ! empty($_SESSION['next']) ) {
				return $_SESSION['next'];
			} else { return Null; }
		} elseif ( $prop === 'questionCount' ) {
			if ( ! empty($_SESSION['questions']) ) {
				return count($_SESSION['questions']);
			} else { return 0; }
		} else { return parent::__get($prop); }
	}
	public function addCourse($course) { global $config, $courses;
		$this->courses[$course->cid] = $course;
	}
	public function addQuestions($cid) { global $config, $courses;
		if ( ! array_key_exists($cid,$courses->courses) ) {
			return $config->_log(8,"unable to add questions for course: $cid");
		} $config->_log(2,"adding questions to exam for course: $cid");
		$course = $courses->courses[$cid];
		foreach ( $course->questions as $qid => $question ) {
			$cqid = "$question->cid.$question->qid";
			if ( in_array($cqid,$this->questions) ) { continue; }
			$this->questions[] = $cqid;
		}
	}
	public function status() { global $config, $request;
		if ( isset($_SESSION['question']) ) {
			return 'x from y';
		} elseif ( ! empty($_SESSION['questions']) ) {
			$total = count($_SESSION['questions']);
			return "$total Fragen";
		} else {
			return 'no exam';
		}
	}
	public function prevquestion() {
	}
	public function nextquestion() {
	}
	public function start() { global $config, $request;
		if ( ! empty($_SESSION['questions']) ) {
			return $config->_log(8,"exam has already started");
		}
		foreach ( $this->courses as $cid => $course ) {
			foreach ( $course->questions as $qid => $question ) {
				$cqid = "$question->cid.$question->qid";
				$this->questions[$cqid] = $question;
			}
		} uksort($this->questions, function() { return rand() > rand(); });
		$questionLimit = $config->questionLimit;
		$this->questions = array_slice($this->questions,0,$questionLimit,True);
		$_SESSION['questions'] = array_keys($this->questions);
		reset($this->questions); $next = current($this->questions);
		unset($_SESSION['previous']); $_SESSION['next'] = "$next->cid.$next->qid";
	}
	public function reset() {
		unset($_SESSION['questions']);
		unset($_SESSION['answers']);
		unset($_SESSION['previous']);
		unset($_SESSION['current']);
		unset($_SESSION['next']);
	}
} // end of class Exam

?>
