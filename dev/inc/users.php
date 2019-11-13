<?php

/*	meta information
	filename: dev/inc/users.php
	description: new approach, user classes
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-13
*/

class Users {
	// defaults
	protected $defaults = [
		'read' => False,
		'users' => [],
		'count' => 0,
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $this->defaults[$prop]; }
		}
		$this->readUsers($config->userfile);
		$config->_log(1,"new Users object: $config->userfile");
	}
	public function readUsers($userfile) { global $config;
		$config->_log(2,"reading users from file: $config->userfile");
	}
} // end of class Users

class User {
} // end of class User

?>
