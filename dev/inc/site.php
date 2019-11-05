<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-05
*/

// config
$config = $_SESSION['config'];

// users
require_once('inc/users.php');
# $users = new Users();

// courses
require_once('inc/courses.php');

// pages

class Site {
	// properties
	public $name = 'exams';
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
	public function routing() {
		if ( isset($_GET['register']) ) {
			$this->title = 'register';
			$this->content = 'form';
		} elseif ( empty($_GET) ) {
			$this->title = 'empty';
			$this->content = 'nothing';
			$this->_format(1,'test');
		} else {
			$this->title = 'error';
			$this->content = 'oops';
		}
	}
	public function _format($object,$template) {
		require_once("$this->skindir/templates.php");
		if ( isset($templates) and array_key_exists($template,$templates) ) {
			$template = $templates[$template];
			if ( is_readable("$this->skindir/$template") ) {
				$template = file_get_contents("$this->skindir/$template");
			}
		}
		// do the formatting below, check getHtml
		echo $object, $template;
	}
} // end of class Site

?>
