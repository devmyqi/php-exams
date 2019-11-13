<?php

/*	meta information
	filename: dev/inc/site.php
	description: new approach, site class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-13
	notes: this is the main class, holding all data (config is global)
*/

# require_once('inc/users.php');
# require_once('inc/courses.php'); # not yet implemented
# require_once('inc/exams.php'); # not yet implemented

class Site {
	protected $defaults = [
		// properties
		'sid' => 'home_',
		'name' => 'exams?',
		'version' => 'v0.0.2 (alpha2) [dev]',
		'title' => 'homepage',
		'content' => '',
		'initdate' => False,
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( property_exists($config,$prop) ) {
				$this->$prop = $config->$prop;
			} elseif ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		}
		$config->_log(1,"new Site: $this->name ($this->sid)");
		$this->initdate = date('Y-m-d H:i:s'); // debug
	}
	public function asArray() { $data = []; // stores site data in session
		foreach ( array_keys($this->defaults) as $prop ) {
			$data[$prop] = $this->$prop;
		} return $data;
	}
} // end of class Site

?>
