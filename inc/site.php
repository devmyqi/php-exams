<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-21
	notes: loaded last, all objects loaded before
*/

// global $config, $request, $users, $courses, $exam, $site;

class Site {
	protected $defaults = [
		// properties
		'sid' => 'empty',
		'name' => 'exams?',
		'version' => 'v0.0.2 (alpha2) [dev]',
		'title' => 'homepage',
		'content' => 'empty',
		'initdate' => False,
		'debug' => '',
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( property_exists($config,$prop) ) {
				$this->$prop = $config->$prop;
			} elseif ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		}
		$config->_log(1,"new Site: $this->name ($this->sid)");
		$this->initdate = date('Y-m-d H:i:s'); // debug
		$this->routing();
	}
	// static functions
	static function _getTemplate($template) { global $config, $templates;
		require_once("$config->skindir/templates.php");
		if ( array_key_exists($template,$templates) ) { $template = $templates[$template]; }
		if ( is_readable("$config->skindir/$template") ) {
			$template = file_get_contents("$config->skindir/$template");
		} elseif ( is_readable($template) ) { $template = file_get_contents($template);
		} return $template;
	}
	static function _format($object,$template,$single=False) {
		$template = Site::_getTemplate($template);
		if ( is_array($object) and $single ) { // assoc array
			preg_match_all('/\$(\w+)/',$template,$result); $replace = [];
			foreach ( $result[1] as $key ) {
				if ( array_key_exists($key,$object) ) {
					$replace['$'.$key] = $object[$key];
				} else { $replace['$'.$key] = ''; }
			} return strtr($template,$replace);
		} elseif ( is_array($object) ) { $formatted = "";
			foreach ( $object as $item ) {
				$formatted .= Site::_format($item,$template);
			} return $formatted;
		} elseif ( is_object($object) ) {
			preg_match_all('/\$(\w+)/',$template,$result); $replace = [];
			foreach ( $result[1] as $key ) {
				try { $replace['$'.$key] = $object->$key;
				} catch ( exception $e ) { $replace['$'.$key] = '-'; }
			} return strtr($template,$replace);
		} else { return sprintf($template,$object); }
	}
	// protected functions
	protected function errorPage($template) {
		$this->sid = 'error'; $this->title = 'Fehler';
		$this->content = Site::_format($this,$template);
	}
	protected function routing() {
		global $config, $request, $users, $courses, $exam; // all objects
		// default route
		if ( empty($request->get) ) {
			$this->sid = 'welcome'; $this->title = 'Willkommen';
			$this->content = Site::_format($this,'siteWelcome');
		// auth routes
		} elseif ( isset($request->get['register']) ) { $users->register($request);
			$this->sid = 'register'; $this->title = 'Registration';
			$this->content = Site::_format($request,'userRegister');
		} elseif ( isset($request->get['login']) ) { $users->login($request);
			$this->sid = 'login'; $this->title = 'Anmelden';
			$this->content = Site::_format($request,'userLogin');
		// user routes
		} elseif ( isset($request->get['profile']) ) {
			$users->profile($request);
			$this->sid = 'profile'; $this->title = 'Profil';
			$this->content = Site::_format($request,'userProfile');
		} elseif ( isset($request->get['logout']) ) {
			$users->logout($request);
			$this->sid = 'logout'; $this->title = 'Abmelden';
			$this->content = Site::_format($request,'userLogout');
		// exam routes
		} elseif ( isset($request->get['exam']) ) {
			$this->sid = 'exam'; $this->title = 'Prüfung';
			if ( empty($_SESSION['questions']) ) {
				$this->content = 'start';
			} else {
				$this->content = 'questions';
			}
		} elseif ( isset($request->get['start']) ) {
			$this->sid = 'start'; $this->title = 'Start';
			if ( ! empty($request->get['c']) ) { $cid = $request->get['c'];
				if ( ! array_key_exists($cid,$courses->courses) ) {
					return $this->errorPage('courseMissing');
				} $course = $courses->courses[$cid];
				$exam->addCourse($course); $exam->start();
				$this->content = Site::_format($exam,'examSplash');
			} else { return $this->errorPage('examMissing'); }
		} elseif ( isset($request->get['overview']) ) {
			$this->sid = 'overview'; $this->title = 'Übersicht';
			$this->content = "<h2>Übersicht</h2><ul>";
			foreach ( $_SESSION['questions'] as $cqid ) {
				$this->content .= "<li>$cqid</li>\n";
			} $this->content .= "</ul>\n";
		} elseif ( isset($request->get['reset']) ) {
			$exam->reset();
			$this->sid = 'reset'; $this->title = 'Zurücksetzen';
			$this->content = Site::_format($exam,'examReset');
		// course questions routes
		} elseif ( ! empty($request->get['cq']) ) {
			$cqid = $request->get['cq'];
			if ( ! preg_match('/^([\w\d]+)\-([\w\d]+)$/',$cqid,$result) ) {
				return $this->errorPage('internalError');
			} $cid = $result[1]; $qid = $result[2];
			if ( ! array_key_exists($cid,$courses->courses) ) {
				return $this->errorPage('courseMissing');
			} $course = $courses->courses[$cid];
			if ( ! array_key_exists($qid,$course->questions) ) {
				return $this->errorPage('questionMissing');
			} $question = $course->questions[$qid];
			$exam->saveResult("$question->cid-$question->qid");
			// $exam->saveResult($question);
			$this->sid = 'question'; $this->title = 'Frage';
			$this->content = Site::_format($question,'questionForm');
			foreach ( $question->answers as $aid => $answer ) {
				$this->content .= Site::_format($answer,'answerSelect');
			}
			$this->content .= $this->getExamNavig();
			# $this->content .= $exam->getNavig();
			$this->content .= Site::_format($question,'questionSubmit');
		// courses routes
		} elseif ( isset($request->get['courses']) ) {
			$this->sid = 'courses'; $this->title = 'Kurs-Übersicht';
			$this->content = Site::_format($courses,'coursesPreview');
			foreach ( $courses->courses as $course ) {
				$this->content .= Site::_format($course,'coursePreview');
			}
		} elseif ( isset($request->get['select']) ) {
			$this->sid = 'select'; $this->title='Kurs-Auswahl';
			$this->content = Site::_format($courses,'coursesForm');
			foreach ( $courses->courses as $cid => $course ) {
				$this->content .= Site::_format($course,'courseSelect');
			} $this->content .= Site::_format($courses,'coursesSubmit');
		// course routes
		} elseif ( ! empty($request->get['c']) ) {
			if ( ! array_key_exists($request->get['c'],$courses->courses) ) {
				return $this->errorPage('courseMissing');
			} $course = $courses->courses[$request->get['c']];
			// question routes
			if ( ! empty($request->get['q']) ) {
				if ( ! array_key_exists($request->get['q'],$course->questions) ) {
					return $this->errorPage('questionMissing');
				} $question = $course->questions[$request->get['q']];
				$this->sid = 'question'; $this->title = 'Frage';
				$this->content = Site::_format($question,'questionForm');
				foreach ( $question->answers as $aid => $answer ) {
					$this->content .= Site::_format($answer,'answerSelect');
				} $this->content .= Site::_format($question,'questionSubmit');
			} else { 
				$this->sid = 'course'; $this->title='Kurs-Details';
				$this->content = Site::_format($course,'courseDetails');
				$this->content .= "<h3>Fragen dieses Kurses</h3><ul>\n";
				foreach ( $course->questions as $qid => $question ) {
					$this->content .= Site::_format($question,'questionListItem');
				} $this->content .= "</ul>\n";
			}
		// admin routes
		// debug routes
		} else { return $this->errorPage('siteMissing'); }
	}
	// public functions
	public function getUserMenu() {
		if ( isset($_SESSION['active']) ) {
			$userdata = $_SESSION['active'];
			return Site::_format($userdata,'siteUserMenu',True);
		} else { return Site::_format($this,'siteAuthMenu'); }
	}
	public function getExamMenu() { global $exam;
		if ( ! empty($_SESSION['questions']) ) { // exam started
			if ( empty($_SESSION['previous']) and empty($_SESSION['current']) ) {
				return Site::_format($exam,'examMenuBegin');
			} elseif ( empty($_SESSION['previous']) ) {
				return Site::_format($exam,'examMenuFirst');
			} elseif ( empty($_SESSION['next']) ) {
				return Site::_format($exam,'examMenuLast');
			} else { return Site::_format($exam,'examMenuNext'); }
		} else { // no exam started
			return Site::_format($exam,'examMenuStart');
		}
		// return Site::_format($exam,'siteExamMenu');
	}
	public function getExamNavig() { global $config, $exam;
		if ( empty($_SESSION['current']) ) {
			return $config->_log(8,"no current question to get navigation for");
		} $index = $exam->getIndex($_SESSION['current']);
		if ( $index === False ) {
			return $config->_log(8,"current question not in exam to navigate");
		} $total = count($_SESSION['questions']);
		if ( empty($_SESSION['previous']) ) {
			return Site::_format($exam,'examNavigFirst');
		} elseif ( empty($_SESSION['next']) ) {
			return Site::_format($exam,'examNavigLast');
		} else { return Site::_format($exam,'examNavigNext'); }
	}
	// debug functions
} // end of class Site

?>
