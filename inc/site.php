<?php

/*	meta information
	filename: inc/site.php
	description: website classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-31
	modified: 2019-10-31
*/

// config, use global
require_once('config.php');
$config = isset($_SESSION['config']) ? $_SESSION['config'] : new Config();
$_SESSION['config'] = $config;

class Site {
	public $name = 'exams?';
	public $title = 'homepage';
	public $content = '';
	public $modified = 'Oktober 2019';
	public function __construct() { global $config;
		$config->_log(1,'new <Site> object initialized');
		$this->url = $_SERVER['PHP_SELF'];
		$this->route();
	}
	// static functions
	static function getHtml($object,$template) {
		require('_templates.php');
		$template = array_key_exists($template,$templates)
			? $templates[$template] : $template;
		if ( is_array($object) ) { $html = "";
			foreach ( $object as $item ) {
				$html .= Site::getHtml($item,$template);
			} return $html;
		} elseif ( is_object($object) ) {
			preg_match_all('/\$(\w+)/',$template,$result);
			$objarray = (array)$object; $replace = [];
			foreach ( $result[1] as $key ) {
				if ( array_key_exists($key,$objarray) ) {
					$replace['$'.$key] = $objarray[$key];
				} else { $replace['$'.$key] = ''; }
			} return strtr($template,$replace);
		} else { return sprintf($template,$object); }
	}
	// public functions
	// protected functions
	protected function route() {
		// print "<pre>\n"; print_r($_GET); print "</pre>\n";
		// print "<pre>\n"; print_r($_SESSION); print "</pre>\n";
		$cid = isset($_GET['c']) ? $_GET['c'] : NULL;
		if ( $cid !== NULL ) {
			// processing courses
		} else { $this->title = 'Starteite';
			$this->content = "<h2>Es gibt folgende Kurse:</h2>\n";
			foreach ( $_SESSION['courses'] as $course ) {
				$this->content .= Site::getHtml($course,'coursePreview') . "\n";
			}
		}
	}
} // end of class Site

/* test cases for Site::getHtml() #todo remove test cases later

class Test {
	public $id = 0; public $name = 'default';
	public function __construct($id=0,$name='default') {
		$this->id = $id; $this->name = $name;
	}
}

$test = new Test();
$test1 = new Test(1,'one');
$test2 = new Test(2,'two');
$test3 = new Test(3,'three');

// object
echo Site::getHtml(new Test(),'object: $name (id=$id) [?$invalid] -')."\n";
// object template
echo Site::getHtml(new Test(),'testTwo')."\n";
// string and number
echo Site::getHtml('what','<p>%s else</p>')."\n";
echo Site::getHtml(2,'<p>number %d/p>')."\n";
// array
echo Site::getHtml([1,2,3],"- %d -\n");
// object array
echo Site::getHtml([$test1,$test2,$test3],'object $name - (id=$id) [?$missing]'."\n");

*/

?>
