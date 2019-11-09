<?php

/*	meta information
	filename: dev/inc/users.php
	description: users classes for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-07
*/

// requires config in _SESSION
$config = $_SESSION['config'];

class Users {
	public $regcheck = ['email','username','password','confirm'];
	public $authcheck = ['email','password'];
	public $userlist = [];
	public $active = False;
	public function __construct() { global $config;
		$config->_log(1,'new <Users> object initialized');
		$this->readUsers($config->userfile);
	}
	public function checkRegData($postdata) { global $config;
		$config->_log(2,'checking registration data in class Users');
		if ( ! empty(array_diff($this->regcheck,array_keys($postdata))) ) {
			return ['warning','Bitte fülle alle Felder aus!'];
		} elseif ( array_key_exists($postdata['email'],$this->userlist) ) {
			return ['warning','Die E-Mail-Adresse ist bereits registriert!'];
		} elseif ( empty($postdata['email']) ) {
			return ['warning','Bitte gebe eine E-Mail-Adresse ein!'];
		} elseif ( empty($postdata['username']) ) {
			return ['warning','Bitte gebe einen Benutzernamen ein!'];
		} elseif ( empty($postdata['password']) ) {
			return ['warning','Bitte gebe einen Passwort ein!'];
		} elseif ( $postdata['password'] !== $postdata['confirm'] ) {
			return ['warning','Das Passwort muss korrekt wiederholt werden!'];
		} else { return ['passed','Die Benutzer-Daten wurden korrekt eingegeben!']; }
	}
	public function checkAuthData($postdata) { global $config;
		$config->_log(2,'checking authentication data in class Users');
		if ( ! empty($postdata['password']) and $config->encrypt ) {
			$postdata['password'] = md5($postdata['password']); }
		if ( ! empty(array_diff($this->authcheck,array_keys($postdata))) ) {
			return ['warning','Bitte fülle alle Felder aus!'];
		} elseif ( empty($postdata['email']) ) {
			return ['warning','Bitte gebe Deine E-Mail-Adresse ein!'];
		} elseif ( empty($postdata['password']) ) {
			return ['warning','Bitte gebe Dein Passwort ein!'];
		} elseif ( ! array_key_exists($postdata['email'],$this->userlist) ) {
			return ['warning','Es gibt keinen Benutzer mit dieser E-Mail-Adresse!'];
		} elseif ( $this->userlist[$postdata['email']]->password != $postdata['password'] ) {
			return ['warning','Das Passwort wurde leider falsch eingegeben!'];
		} else { return ['passed','Die Benutzer-Daten wurden korrekt authentifiziert!']; }
	}
	public function readUsers($userfile) { global $config;
		if ( ! is_readable($userfile) or ! is_file($userfile) ) {
			return $config->_log(8,"unable to read users from: $userfile");
		} $config->_log(2,"reading users from file: $userfile");
		$userlist = json_decode(file_get_contents($userfile),True);
		foreach ( $userlist as $userdata ) {
			$this->userlist[$userdata['email']] = new User($userdata);
		}
	}
	public function addUser($user) { global $config;
		$this->userlist[$user->email] = $user;
	}
	public function saveUsers($userfile) { global $config; $userlist = [];
		if ( ! is_writable($userfile) or ! is_file($userfile) ) {
			return $config->_log(8,"unable to save users to: $userfile");
		} $config->_log(2,"saving users to file: $userfile");
		foreach ( $this->userlist as $email => $user ) { $userlist[] = (array) $user; }
		file_put_contents($userfile,json_encode($userlist,JSON_PRETTY_PRINT));
	}
} // end of class Users

class User {
	public $email = '';
	public $username = '';
	public $password = '';
	public function __construct($userdata) { global $config;
		$this->email = $userdata['email'];
		$this->username = $userdata['username'];
		$this->password = $userdata['password'];
		$config->_log(4,"new User: $this->username <$this->email>");
	}
} // end of class User

?>
