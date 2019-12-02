<?php

// vim-marks : d=Users,u=User,p=Profile,s=Sessing

/*	meta information
	filename: v03/lib/user.php
	description: user classes for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-12-01
	modified: 2019-12-02
*/

class Users {
	static $users = [];
	static $read = False;
	static $count = 0;
	public function __construct() { global $config;
		$config->_log(1,"new <Users> object initialized");
		$this->readJson($config->userFile);
	}
	protected function readJson(string $userFile,bool $force=False) { global $config;
		if ( ! is_file($userFile) or ! is_readable($userFile) ) {
			return $config->_log(8,"unable to read users from: $userFile");
		} elseif ( self::$read and ! $force ) {
			return $config->_log(8,"users aready read from: $userFile");
		} $userList = json_decode(file_get_contents($userFile),True);
		if ( ! $userList ) {
			return $config->_log(8,"unable to parse json in: $userFile");
		} elseif ( ! is_array($userList) ) {
			$config->_log(8,"wrong json format in: $userFile");
		} $count = 0;
		foreach ( $userList as $userData ) {
			if ( ! array_key_exists('email',$userData) ) { continue; }
			self::$users[$userData['email']] = new User($userData); $count++;
		} self::$read = True; self::$count = $count;
		$config->_log(2,"read $count users from json file: $userFile");
	}
	public function printUsers() { global $config;
		foreach ( self::$users as $email => $user ) {
			print_r($user);
		}
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
	public function __construct(array $userData=[]) { global $config;
		foreach ( array_merge($this->defaults,$userData) as $prop => $value ) {
			$this->$prop = $value;
		} $config->_log(2,"new User: $this->username <$this->email>");
	}
} // end of class User

class Profile {
} // end of class Profile

class Setting {
} // end of class Setting

?>
