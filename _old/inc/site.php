<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-11
*/

// config
$config = $_SESSION['config'];

// templates
require_once("$config->skindir/templates.php"); global $templates;

// users
require_once('inc/users.php');
# $users = new Users();

// courses
require_once('inc/courses.php');

// pages

class Post extends Getter {
	public $fields = ['email','username','password','firstname','lastname'];
	public $status = 'normal';
	public $message = 'ohne Nachricht';
	public function __construct($postdata) {
		foreach ( $postdata as $key => $value ) {
			if ( in_array($key,$this->fields) ) { $this->$key = $value; }
		}
	}
} // end of class Post

class Site {
	// properties
	public $name = 'exams?';
	public $sid = 'exams';
	public $title = 'homepage';
	public $content = '';
	public $skindir = 'skins';
	// data objects
	public $users = False;
	public $courses = False;
	public $pages = False;
	public function __construct() { global $config;
		$this->name = $config->sitename;
		$this->skindir = $config->skindir;
		$config->_log(1,"new <Site> object initialized: $this->name");
		$this->users = new Users();
		$this->courses = new Courses();
		$this->formhandler();
		$this->routing();
	}
	// static functions
	static function _getTemplate($template) { global $config, $templates;
		if ( array_key_exists($template,$templates) ) { $template = $templates[$template]; }
		if ( is_readable("$config->skindir/$template") ) {
			$template = file_get_contents("$config->skindir/$template");
		} elseif ( is_readable($template) ) { $template = file_get_contents($template);
		} return $template;
	}
	static function _format($object,$template) {
		$template = Site::_getTemplate($template);
		if ( is_array($object) ) { $formatted = "";
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
	// private functions
	// public functions
	public function formhandler() {
		# print_r($_POST);
	}
	public function getMenuMain() { global $config;
		return Site::_format($this,'siteMenuMain');
	}
	public function getMenuUsers() { global $config;
		if ( $this->users->active ) {
			return Site::_format($this->users->active,'userMenuActive');
		} else { return Site::_format($this,'userMenuAuth'); }
	}
	public function errorPage($template) {
		$this->sid = 'error'; $this->title = 'Fehler';
		$this->content = Site::_format($this,$template);
	}
	public function routing() { global $config;
		// default route
		if ( empty($_GET) ) {
			$this->sid = 'homepage'; $this->title = 'Startseite';
			$this->content = Site::_format($this,'siteHomepage');
		// course routes
		} elseif ( isset($_GET['select']) ) { // courses select
			$this->sid = 'select'; $this->title = 'Kurs-Auswahl';
			$this->content = Site::_format($this,'coursesForm');
			foreach ( $this->courses->courselist as $cid => $course ) {
				$this->content .= Site::_format($course,'courseSelect');
			}
			$this->content .= Site::_format($this->courses->courselist,'courseSelect');
			$this->content .= Site::_format($this,'coursesSubmit');
		} elseif ( isset($_GET['courses']) ) {
			$this->sid = 'courses'; $this->title = 'Kurs-Übersicht';
			$this->content = "<h2>Übersicht der Kurse</h2>\n<ul>\n";
			foreach ( $this->courses->courselist as $cid => $course ) {
				$this->content .= Site::_format($course,'coursePreview');
				$this->content .= Site::_format($course,'courseLinks');
			} $this->content .="</ul>\n";
		} elseif ( isset($_GET['c']) ) { $this->sid = 'course'; // courses
			if ( ! array_key_exists($_GET['c'],$this->courses->courselist) ) {
				return $this->errorPage('courseMissing');
			} $course = $this->courses->courselist[$_GET['c']];
			if ( isset($_GET['start']) ) { // course start
			} else { $this->title = 'Kurs-Details'; // course details
				$this->content = Site::_format($course,'courseDetails');
				$this->content .= "<h3>Fragen dieses Kurses</h3>\n<ul>\n";
				$this->content .= Site::_format($course->questions,'questionListItem');
				$this->content .= "</ul>\n";
			}
		// question routes
		} elseif ( isset($_GET['q']) ) {
			if ( ! preg_match('/^([\w\-]+)\.([\w\-]+)$/',$_GET['q'],$result) ) {
				return $this->errorPage('errorPage');
			} $cid = $result[1]; $qid = $result[2];
			if ( ! array_key_exists($cid,$this->courses->courselist) ) {
				return $this->errorPage('courseMissing');
			} $course = $this->courses->courselist[$cid];
			if ( ! array_key_exists($qid,$course->questions) ) {
				return $this->errorPage('questionMissing');
			} $question = $course->questions[$qid];
			if ( isset($_GET['answer']) ) {
				$this->sid = 'question'; $this->title = 'Frage';
				$this->content = Site::_format($question,'questionForm');
				$this->content .= Site::_format($question->answers,'answerForm');
				$this->content .= Site::_format($question,'questionSubmit');
			} else {
				$this->sid = 'question'; $this->title = 'Frage';
				$this->content = Site::_format($question,'questionDisplay');
				$this->content .= Site::_format($question->answers,'answerDisplay');
			}
		// user routes
		} elseif ( isset($_GET['register']) ) { $this->sid = 'register';
			list($status,$message) = $this->users->checkRegData($_POST);
			if ( $status === 'passed' ) { $postdata = $_POST;
				if ( $config->encrypt ) { $postdata['password'] = md5($postdata['password']); }	
				$this->users->addUser(new User($postdata));
				$this->users->saveUsers($config->userfile);
				$rhis->sid = 'thanks'; $this->title = 'Dankeschön';
				$this->content .= Site::_format($this,'userRegConfirm');
			} else {
				$this->title = 'Registration';
				$this->content = Site::_format(new Post($_POST),'userRegister');
				$this->content .= "<p class='message $status'>$message</p>\n";
			}
		} elseif ( isset($_GET['login']) ) { $this->sid = 'login';
			list($status,$message) = $this->users->checkAuthData($_POST);
			if ( $status === 'passed' ) {
				$this->users->active = $this->users->userlist[$_POST['email']];
				$this->sid = 'welcome'; $this->title = 'Willkommen';
				$this->content = Site::_format($this->users->active,'userWelcome');
			} else { $post = new Post($_POST);
				$this->sid = 'login'; $this->title = 'Anmelden';
				$post->status = $status; $post->message = $message;
				$this->content .= Site::_format($post,'userLogin');
			}
		} elseif ( isset($_GET['logout']) ) { $this->sid = 'logout';
			$this->title = 'Abmelden';
			$this->content = Site::_format($this,'userLogout');
		// defaults error page
		} else { return $this->errorPage('siteMissing'); }
	}
} // end of class Site

?>
