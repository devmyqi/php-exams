<?php

/*	meta information
	filename: inc/page.php
	description: page classes for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-28
*/

require_once('inc/meta.php');
require_once('inc/data.php');
include('_templates.php');

class Page extends Meta {
	public $name = 'exams?';
	public $title = 'welcome';
	public $description = 'test your knowlede';
	public $content = '';
	public function __construct($config) {
		$this->config = $config;
		$this->_log(1,'new <Page> object initialized');
		$this->data = new Data($config);
		// routing
		$course = isset($_GET['c']) ? $_GET['c'] : NULL;
		$question = isset($_GET['q']) ? $_GET['q'] : NULL;
		# print_r($_GET); # debug
		if ( ! count($_GET) ) { $this->title = "Startseite";
			$this->content = "<h2>Es gibt folgende Kurse:</h2>\n<ul>\n";
			foreach ( $this->data->courses as $cid => $course ) {
				$html = "<li>" . $course->htmlTitle() . "\n";
				$html .= $course->htmlDetails() . "\n";
				$html .= $course->htmlLink() . "</li>\n";
				$this->content .= $html;
			} $this->content .= "</ul>\n";
		} elseif ( $course !== NULL  and isset($_GET['details']) ) {
			if ( ! array_key_exists($course,$this->data->courses) ) {
				return $this->errorPage();
			} $course = $this->data->courses[$course];
			$this->title = "Kurs-Details";
			$this->content = $course->htmlTitle('h2') . "\n";
			$this->content .= $course->htmlDetails() . "\n";
			$this->content .= "<h3>Fragen im Kurs:</h3><ul>\n";
			foreach ( $course->questions as $question ) {
				$this->content .= "<li>$question->topic</li>\n";
			} $this->content .= "</ul>\n";
		} elseif ( $course !== NULL and isset($_GET['all']) ) {
			if ( ! array_key_exists($course,$this->data->courses) ) {
				return $this->errorPage();
			} $course = $this->data->courses[$course];
			$this->title = 'Fragen';
			$this->content = $course->htmlTitle('h2') . "<ul>\n";
			foreach ( $course->questions as $question ) {
				$this->content .= "<li>" . $question->htmlTitle() . "\n";
				$this->content .= "</li>\n";
			} $this->content .= "</ul>\n";
		} elseif ( $course !== NULL ) { $this->title = "Frage";
			if ( ! array_key_exists($course,$this->data->courses) ) {
				return $this->errorPage();
			} $course = $this->data->courses[$course];
			if ( $question === NULL ) {
				$qid = array_keys($course->questions)[0];
				$question = $course->questions[$qid];
			} $index = array_keys($course->questions);
			$this->content = $question->htmlTitle('h2') . "\n";
			$this->content .= $question->htmlDetails() . "\n";
			foreach ( $question->answers as $answer ) {
				$this->content .= $answer->htmlTitle() . "\n";
				$this->content .= $answer->htmlDetails() . "\n";
			} $this->content .= $course->htmlPager($question->qid) . "\n";
		} else { $this->errorPage(); }
	}
	public function errorPage() { $this->title = "Fehler";
		$this->content = "<h2>Es ist ein Fehler aufgetreten</h2>\n";
		$this->content .= "<p>Die von Ihnen angeforderte Seite wurde\n";
		$this->content .= "leider nicht gefunden!</p>\n";
	}
	public function getFooter() {
		return "exams (v0.0.1) &copy; 2019 M.Wronna";
	}
} // end of class Site

class Template extends Meta {
}

?>
