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

// templates

class Test {
	public $var1 = 'just a test';
	public $var2 = 'temp class';
}

class Site {
	static function getHtml($object,$template) {
		require('_templates.php');
		$template = array_key_exists($template,$templates)
			? $templates[$template] : $template;
		if ( is_array($object) ) {
			$html .= "array";
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
} // end of class Site

# echo Site::getHtml('','what')."\n";
$test = new Test();

// object
echo Site::getHtml(new Test(),'- $var1 ($var2) [$invalid] -')."\n";
// object template
echo Site::getHtml(new Test(),'testOne')."\n";
// string and number
echo Site::getHtml('what','<p>%s else</p>')."\n";
echo Site::getHtml(2,'<p>number %d/p>')."\n";

?>
