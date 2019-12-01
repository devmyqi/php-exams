<?php

// vim-marks : d=Users,u=User,p=Profile,s=Sessing

/*	meta information
	filename: v03/lib/user.php
	description: user classes for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-12-01
	modified: 2019-12-01
*/

class Users {
	static $users = [];
	public function __construct() { global $config;
		$config->_log(1,"new <Users> object initialized");
	}
} // end of class Users

class User {
	protected $defaults = [
		'email' => '',
		'password' => '',
		'username' => '',
		'firstname' => '',
		'lastname' => '',
	];
} // end of class User

class Profile {
} // end of class Profile

class Setting {
} // end of class Setting

?>
