<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-07
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
	public $_message = 'ohne Nachricht';
	public function __construct($postdata) {
		foreach ( $postdata as $key => $value ) {
			if ( in_array($key,$this->fields) ) { $this->$key = $value; }
		}
	}
} // end of class Post

class Site {
	// properties
	public $name = 'exams?';
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
	public function routing() { global $config;
		if ( empty($_GET) ) { // homepage
			$this->title = 'Kurs-Liste';
			$this->content = "<h2>Übersicht der Kurse</h2>\n<ul>\n";
			foreach ( $this->courses->courselist as $cid => $course ) {
				$this->content .= Site::_format($course,'coursePreview');
				$this->content .= Site::_format($course,'courseLinks');
			} $this->content .="</ul>\n";
		} elseif ( isset($_GET['c']) ) { // courses
			if ( array_key_exists($_GET['c'],$this->courses->courselist) ) {
				$course = $this->courses->courselist[$_GET['c']];
				$this->title = 'Kurs-Details';
				$this->content = "<h2>$course->title</h2>\n";
				$this->content .= $course->content();
				$this->content .= "<h3>Fragen dieses Kurses</h3>\n";
				foreach ( $course->questions as $qid => $question ) {
					$this->content .= Site::_format($question,'questionListItem');
				}
			} else { $this->title = 'Fehler';
				$this->content = Site::_format($this,'errorPage');
			}
		} elseif ( isset($_GET['register']) ) {
			list($status,$message) = $this->users->checkRegData($_POST);
			if ( $status === 'passed' ) { $postdata = $_POST;
				if ( $config->encrypt ) { $postdata['password'] = md5($postdata['password']); }	
				$this->users->addUser(new User($postdata));
				$this->users->saveUsers($config->userfile);
				$this->title = 'Dankeschön';
				$this->content .= Site::_format($this,'userRegConfirm');
			} else {
				$this->title = 'Registration';
				$this->content = Site::_format(new Post($_POST),'userRegister');
				$this->content .= "<p class='message $status'>$message</p>\n";
			}
		} elseif ( isset($_GET['login']) ) {
			list($status,$message) = $this->users->checkAuthData($_POST);
			if ( $status === 'passed' ) {
				$this->title = 'Willkommen';
				$this->content = "<h2>Du hast Dich erfolgreich angemeldet!</h2>\n";
				$this->content .= "<p>Mach was!</p>\n";
			} else {
				$this->title = 'Anmelden';
				$this->content = "<h3>Melde Dich hier mit Deinen Zugangs-Daten an</h3>\n";
				$this->content .= Site::_format(new Post($_POST),'userLogin');
				$this->content .= "<p class='message $status'>$message</p>\n";
			}
		} else {
			$this->title = 'Fehler';
			$this->content = Site::_format($this,'errorPage');
		}
	}
} // end of class Site

?>
