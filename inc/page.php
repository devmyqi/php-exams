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
include('_templates.php');

class Page extends Meta {
	public $name = 'exams';
	public $title = 'welcome';
	public $description = 'test your knowlede';
	public $content = '';
	public function __construct($config) {
		$this->config = $config;
		$this->_log(1,'new <Page> object initialized');
		$this->data = new Data($config);
		// routing
		if ( ! count($_GET) ) {
			$this->title = "Startseite";
			$this->content = "<h2>Es gibt folgende Kurse</h2>\n";
			$this->content .= "<ol>\n";
			foreach ( $this->data->courses as $index => $course ) {
				$number = $index + 1;
				$this->content .= "<li><h3>$number. $course->topic</h3></li>\n";
			}
			$this->content .= "</ol>\n";
		}
	}
	public function getFooter() {
		return " exams - tethis is the footer";
	}
} // end of class Site

class Template extends Meta {
}

?>
