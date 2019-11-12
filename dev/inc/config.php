<?php

/*	meta information
	filename: dev/inc/config.php
	description: new approach, config class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-12
	notes: loaded into a site object
*/

class Config {
	public $defaults = [
		// debug
		'initdate' => False,
		// config
		'inifile' => 'settings.ini',
		// logging
		'loglevel' => 63,
		'logdate' => 'H:i:s.u',
		'logtypes' => [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'],
		// site
		'name' => 'exams?',
		'skindir' => 'skins',
		// users
		'userfile' => 'users.json',
		'encrypt' => True,
		// courses
		'datadir' => 'data',
		'files' => '*.md',
	];
	public function __construct($data=[]) {
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		} $this->initdate = date('Y-d-m H:i:s');
	}
} // end of class Config

?>
