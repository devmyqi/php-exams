<?php

/*	meta information
	filename: inc/page.php
	description: page classes for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-27
*/

require_once('inc/meta.php');
require_once('inc/data.php');

class Page extends Meta {
	public $name = 'exams';
	public $title = 'welcome';
	public $description = 'test your knowlede';
	public $content = 'yo';
	public function __construct($config) {
		$this->config = $config;
		$this->_log(1,'new <Page> object initialized');
		// routing
		
		$this->data = new Data($config);
	}
	public function getFooter() {
		return 'this is the footer';
	}
} // end of class Site

?>
