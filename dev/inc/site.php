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
	static function _nformat($object,$template) {
	}
	// protected functions
	// private functions
	// public functions
	public function routing() {
		if ( empty($_GET) ) { // homepage
			$this->title = 'Kurs-Liste';
			$this->content = "<h2>Übersicht der Kurse</h2>\n";
			$this->content .= Site::_format($this->courses->courselist,'coursePreview<br/>');
			// echo $this->_format(1,'tei%sst');
		} elseif ( isset($_GET['register']) ) {
			$this->title = 'register';
			$this->content = 'form';
		} else {
			$this->title = 'error';
			$this->content = 'oops';
		}
	}
	public function _format($object,$template) { global $templates;
		print_r($templates);
		if ( array_key_exists($template,$templates) ) {
			$template = $templates[$template];
			if ( is_readable("$this->skindir/$template") ) {
				$template = file_get_contents("$this->skindir/$template");
			}
		print ("format template: $template");
		}
		if ( is_array($object) ) { $formatted = "";
			foreach ( $object as $item ) {
				$formatted .= Site::_format($item,$template);
			} return $formatted;
		} elseif ( is_object($object) ) {
			preg_match_all('/\$(\w+)/',$template,$result);
			$objarray = (array)$object; $replace = [];
			foreach ( $result[1] as $key ) {
				if ( array_key_exists($key,$objarray) ) {
					$replace['$'.$key] = $objarray[$key];
				} else {
					$replace['$'.$key] = '';
				}
			} return strtr($template,$replace);
		} else { return sprintf($template,$object); }
	}
} // end of class Site

?>
