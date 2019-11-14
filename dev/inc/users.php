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
		$config->_log(1,"new Users object: $config->userfile");
		$this->readUsers($config->userfile);
	}
	public function readUsers($userfile,$force=False) { global $config;
		if ( ! is_readable($userfile) or ! is_file($userfile) ) {
			return $config->_log(8,"unable to read users from: $config->userfile");
		} elseif ( $this->read and ! $force ) {
			return $config->_log(8,"users aready read from: $config->userfile");
		} $userlist = json_decode(file_get_contents($userfile),True);
		if ( ! $userlist ) {
			return $config->_log(8,"unable to parse json in: $config->userfile");
		} elseif ( ! is_array($userlist) ) {
			$config->_log(8,"wrong json format in: $config->userfile");
		} $this->count = count($userlist);
		foreach ( $userlist as $userdata ) {
			$this->users[$userdata['email']] = new User($userdata);
		} $this->read = True;
		$config->_log(2,"read $this->count users from file: $config->userfile");
	}
} // end of class Users

class User {
	protected $defaults = [
		'email' => '',
		'username' => '',
		'password' => '',
	];
	public function __construct($data) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $this->defaults[$prop]; }
		} $config->_log(4,"new User: $this->username <$this->email>");
	}
} // end of class User

?>
