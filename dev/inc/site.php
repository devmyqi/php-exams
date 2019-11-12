<?php

/*	meta information
	filename: dev/inc/site.php
	description: new approach, site class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-12
	notes: this is the master class, loading all others
*/

require_once('inc/config.php');
require_once('inc/users.php');

class Getter {
	public function __get($prop) {
		$objectvars = get_object_vars($this);
		$classvars = get_class_vars(get_class($this));
		if ( $property_exists($this,$prop) ) { return $this->$prop;
		} elseif ( method_exists($this,$prop) ) { return $this->$prop();
		} elseif ( array_key_exists($prop,$classvars) ) { return $classvars[$prop];
		} else { return Null; }
	}
} // end of class Getter

class Site extends Getter {
	// debug
	public $initdate = False;
	// setting
	public $skindir = 'skins';
	// properties
	public $id = 'home';
	public $name = 'exams?';
	public $title = 'homepage';
	public $content = '';
	// objects
	public $config = False;
	public function __construct($data=[]) {
		$this->initdate = date('Y-m-d H:i:s');
		$this->config = new Config();
	}
	// defaults
	protected $defauls = [
	];
	public function __something() {
		return 'else';
	}
} // end of class Site

?>
