<?php

/*	meta information
	filename: dev/inc/exam.php
	description: exam class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-15
	modified: 2019-11-21
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
		if ( $prop === 'courseCount' ) {
			return count($this->courses);
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
		} elseif ( $prop === 'index' ) {
			if ( ! empty($_SESSION['current']) ) {
				$index = $this->getIndex($_SESSION['current']);
				return $index ? $index : 0;
			} else { return 0; }
		} elseif ( $prop === 'total' ) {
			if ( ! empty($_SESSION['questions']) ) {
				return count($_SESSION['questions']);
			} else { return 0; }
		} elseif ( $prop === 'open' ) {
			return 42;
		} else { return parent::__get($prop); }
	}
	public function getIndex($cqid) { global $config;
		if ( empty($_SESSION['questions']) ) {
			return $config->_log(8,"exam not yet started to get navigation");
		} $index = array_search($cqid,$_SESSION['questions']);
		# $config->_log(32,"getting current index ($index): $cqid");
		if ( $index === False ) {
			return $config->_log(8,"current question ($cqid) not in questions");
		} return $index + 1; // starting to count from 1
	}
	public function getResult() { global $config, $courses, $site;
		if ( empty($_SESSION['questions']) ) {
			return $config->_log(8,"unable to get results if exam is not started");
		} $questions = $_SESSION['questions'];
		$answers = ! empty($_SESSION['answers']) ? $_SESSION['answers'] : [];
		$result = ['total'=>$this->total,'open'=>0,'answered'=>0,'wrong'=>0,
			'correct'=>0,'quote'=>0,'missing'=>0];
		foreach ( $questions as $cqid ) {
			$question = $courses->getQuestion($cqid);
			if ( ! is_object($question) ) { $result['missing'] += 1; continue; }
			if ( array_key_exists($cqid,$answers) ) {
				$result['answered'] += 1; $selection = $answers[$cqid];
			} else { $result['open'] += 1; continue; }
			$correct = $question->isCorrect($selection);
			if ( $correct ) { $result['correct'] += 1;
			} else { $result['wrong'] += 1; }
		} $result['quote'] = $result['correct'] / $result['total'];
		return $result;
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
	public function saveResult($currentid) { global $config, $request, $courses;
		// fast forward
		if ( empty($_SESSION['questions']) ) {
			return $config->_log(8,"unable to save result with no exam started");
		} $index = array_search($currentid,$_SESSION['questions']);
		if ( $index === False ) {
			return $config->_log(8,"unable to find current question: $currentid");
		}
		if ( $index >= 1 ) {
			$_SESSION['previous'] = $_SESSION['questions'][$index-1];
		} else { $_SESSION['previous'] = False; }
		if ( $index < count($_SESSION['questions'])-1 ) {
			$_SESSION['next'] = $_SESSION['questions'][$index+1];
		} else { $_SESSION['next'] = False; }
		$_SESSION['current'] = $currentid;
		// get question
		if ( empty($request->post['question']) ) {
			return $config->_log(8,"there is no selection to save");
		} $cqid = $request->post['question'];
		if ( ! preg_match('/^([\w\d]+)\-([\w\d]+)$/',$cqid,$result) ) {
			return $config->_log(8,"internal error: wrong cqid format");
		} $cid = $result[1]; $qid = $result[2];
		if ( ! array_key_exists($cid,$courses->courses) ) {
			return $config->_log(8,"non existing course to save selection: $cid");
		} $course = $courses->courses[$cid];
		if ( ! array_key_exists($qid,$course->questions) ) {
			return $config->_log(8,"non existing question to save selection: $qid");
		} $question = $course->questions[$qid];
		// save result in session
		if ( ! empty($request->post['selected']) ) {
			$_SESSION['answers'][$cqid] = [];
			foreach ( $request->post['selected'] as $selection ) {
				$_SESSION['answers'][$cqid][] = $selection;
			}
		}
		$config->_log(2,"saving result of previous question: $cqid");
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
	public function _saveResult($currentid=False) { global $config;
		if ( empty($_SESSION['questions']) ) {
			return $config->_log(8,"unable to save result with no exam started");
		} $index = array_search($currentid,$_SESSION['questions']);
		if ( $index === False ) {
			return $config->_log(8,"unable to find current question: $currentid");
		}
		if ( $index >= 1 ) {
			$_SESSION['previous'] = $_SESSION['questions'][$index-1];
		} else { $_SESSION['previous'] = False; }
		if ( $index < count($_SESSION['questions'])-1 ) {
			$_SESSION['next'] = $_SESSION['questions'][$index+1];
		} else { $_SESSION['next'] = False; }
		$_SESSION['current'] = $currentid;
		
		$config->_log(2,"saving result of previous question: $index");
		
	}
	public function start() { global $config, $request;
		if ( ! empty($_SESSION['questions']) ) {
			return $config->_log(8,"exam has already started");
		}
		foreach ( $this->courses as $cid => $course ) {
			foreach ( $course->questions as $qid => $question ) {
				$cqid = "$question->cid-$question->qid";
				$this->questions[$cqid] = $question;
			}
		} uksort($this->questions, function() { return rand() > rand(); });
		$questionLimit = $config->questionLimit;
		$this->questions = array_slice($this->questions,0,$questionLimit,True);
		$_SESSION['questions'] = array_keys($this->questions);
		reset($this->questions);
		$_SESSION['answers'] = [];
		$_SESSION['previous'] = False;
		$_SESSION['current'] = False;
		$next = current($this->questions);
		$_SESSION['next'] = "$next->cid-$next->qid";
	}
	public function getNavig() {
		if ( empty($_SESSION['questions']) ) {
			return $config->_log(8,"exam not yet started to get navigation");
		} elseif ( empty($_SESSION['current']) ) {
			return $config->_log(8,"no current question to get navigation for");
		}
		$index = $this->getIndex($_SESSION['current']);
		$total = count($_SESSION['questions']); $navig = '';
		if ( ! empty($_SESSION['previous']) ) {
			$navig .= '<button type="submit" formaction="?previous">Zurück</button>';
		} $navig .= "Frage $index von $total";
		if ( ! empty($_SESSION['next']) ) {
			$navig .= '<button type="submit" formaction="?next">Weiter</button>';
		} elseif ( $index == $total ) {
			$navig .= '<button type="submit" formaction="?overview">Übersicht</button>';
		} return $navig . "<br/>";
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
