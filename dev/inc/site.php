<?php

/*	meta information
	filename: dev/inc/site.php
	description: site class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-05
*/

// load-chain: site->[config,users]

// config
require_once('inc/config.php');
$config = new Config('terminal');
$_SESSION['config'] = $config;

// users
require_once('inc/users.php');
# $users = new Users();

// courses
require_once('inc/courses.php');

// pages

class Site {
	// properties
	public $sitename = 'exams';
	public $skindir = 'skins';
	// data objects
	public $users = False;
	public $courses = False;
	public $pages = False;
	public function __construct() { global $config;
		$this->sitename = $config->sitename;
		$this->skindir = $config->skindir;
		$config->_log(1,"new <Site> object initialized: $this->sitename");
		$this->users = new Users();
	}
} // end of class Site

?>