<?php

/*	meta information
	filename: inc/page.php
	description: page classes for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-29
*/

require_once('config.php');
require_once('inc/meta.php');
require_once('inc/data.php');

class Page extends Meta {
	public $name = 'exams?';
	public $title = '';
	public $description = 'test your knowlede';
	public $content = '';
	public function __construct($config) {
		$this->config = $config;
		$this->_log(1,'new <Page> object initialized');
		$this->data = new Data($config);
		$this->routing();
	}
	public function errorPage() { $this->title = "Fehler";
		$this->content = "<h2>Es ist ein Fehler aufgetreten</h2>\n";
		$this->content .= "<p>Die von Ihnen angeforderte Seite wurde\n";
		$this->content .= "leider nicht gefunden!</p>\n";
	}
	public function routing() {
		$cid = isset($_GET['c']) ? $_GET['c'] : NULL;
		$qid = isset($_GET['q']) ? $_GET['q'] : NULL;
		if ( $cid !== NULL ) {
			// geeting course and question
			if ( ! array_key_exists($cid,$this->data->courses) ) {
				return $this->errorPage();
			} $course = $this->data->courses[$cid]; // existing course
			if ( $qid === NULL ) { $qid = array_key_first($course->questions); }
			if ( ! array_key_exists($qid,$course->questions) ) {
				return $this->errorPage();
			} $question = $course->questions[$qid];
			if ( isset($_GET['details']) ) { $this->title = "Kurs-Details";
				$this->content = $course->htmlTitle('h2') . "\n";
				$this->content .= $course->htmlDetails() . "\n";
				$this->content .= "<h3>Fragen im Kurs:</h3><ul>\n";
				$url = $_SERVER['PHP_SELF'] . "?c=$course->cid";
				foreach ( $course->questions as $question ) {
					$this->content .= "<li><a title='Zur Frage' href='$url&q=$question->qid'>\n";
					$this->content .= "$question->topic</a></li>\n";
				} $this->content .= "</ul>\n";
			} else { $this->title = "Frage"; // course default start
				# $this->content = $course->htmlTitle('h2');
				$this->content .= $question->htmlTitle('h2');
				$this->content .= $question->htmlDetails();
				foreach ( $question->answers as $answer ) {
					$this->content .= $answer->htmlTitle();
					$this->content .= $answer->htmlDetails();
				} $this->content .= $course->htmlPager($question->qid);
			}
		} else { $this->title = 'Startseite'; // home page
			$this->content = "<h2>Es gibt folgende Kurse:</h2>\n<ul>\n";
			foreach ( $this->data->courses as $cid => $course ) {
				$this->content .= "<li>" . $course->htmlTitle() . "\n";
				$this->content .= $course->htmlPreview() . "\n";
				$this->content .= $course->htmlLink() . "</li>\n";
			} $this->content .= "</ul>\n";
		}
	}
	public function getFooter() {
		return "exams (v0.0.1) &copy; 2019 M.Wronna";
	}
} // end of class Site

class Template extends Meta {
}

?>
