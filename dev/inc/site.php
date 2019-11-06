<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-06
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
	public function routing() {
		if ( empty($_GET) ) { // homepage
			$this->title = 'Kurs-Liste';
			$this->content = "<h2>Übersicht der Kurse</h2>\n<ul>\n";
			foreach ( $this->courses->courselist as $cid => $course ) {
				$this->content .= Site::_format($course,'coursePreview');
				$this->content .= Site::_format($course,'courseLinks');
			} $this->content .="</ul>\n";
			// echo $this->_format(1,'tei%sst');
		} elseif ( isset($_GET['c']) ) { // corses
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
			$this->title = 'register';
			$this->content = 'form';
		} else { $this->title = 'Fehler';
			$this->content = Site::_format($this,'errorPage');
		}
	}
} // end of class Site

?>
