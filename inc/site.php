<?php

/*	meta information
	filename: inc/site.php
	description: web site classes for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-27
*/

require_once('inc/meta.php');

class Site extends Meta {
	public function __construct() {
		$this->_log(1,'new <Site> object initialized');
	}
} // end of class Site

class Page extends Meta {
} // end of class Page

?>
