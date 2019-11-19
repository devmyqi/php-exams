<?php

/*	meta information
	filename: dev/inc/users.php
	description: new approach, user classes
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-15
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
		} $config->_log(1,"new Users object: $config->userfile");
		# $this->readUsers($config->userfile); # on demand?
	}
	public function readUsers($userfile,$force=False) { global $config;
		if ( ! is_readable($userfile) or ! is_file($userfile) ) {
			return $config->_log(8,"unable to read users from: $userfile");
		} elseif ( $this->read and ! $force ) {
			return $config->_log(8,"users aready read from: $userfile");
		} $userlist = json_decode(file_get_contents($userfile),True);
		if ( ! $userlist ) {
			return $config->_log(8,"unable to parse json in: $userfile");
		} elseif ( ! is_array($userlist) ) {
			$config->_log(8,"wrong json format in: $userfile");
		} $this->count = count($userlist);
		foreach ( $userlist as $userdata ) {
			$this->users[$userdata['email']] = new User($userdata);
		} $this->read = True;
		$config->_log(2,"read $this->count users from file: $userfile");
	}
	public function saveUsers($userfile) { global $config; $userlist = [];
		if ( ! is_writeable($userfile) or ! is_file($userfile) ) {
			return $config->_log(8,"unable to save users to: $config->userfile");
		} foreach ( $this->users as $user ) {
			$userlist[] = $user->asArray($password=True);
		} $count = count($userlist);
		$userjson = json_encode($userlist,JSON_PRETTY_PRINT);
		file_put_contents($userfile,$userjson);
		$config->_log(2,"saved $count users to file: $userfile");
	}
	public function register($request) { global $config;
		if ( ! $this->read and empty($this->users) ) {
			$this->readUsers($config->userfile);
		} $email = $request->email; $username = $request->username;
		$password = $request->password; $confirm = $request->confirm;
		if ( isset($_SESSION['active']) ) { $request->status = 'warning';
			$request->message = 'Du bist bereits angemeldet';
		} elseif ( empty($email) ) { $request->status = 'warning';
			$request->message = 'Bitte gib eine E-Mail-Adresse ein';
		} elseif ( array_key_exists($email,$this->users) ) {
			$request->status = 'warning';
			$request->message = 'Diese E-Mail-Adresse ist bereits registriert';
		} elseif ( empty($username) ) { $request->status = 'warning';
			$request->message = 'Bitte gib einen Benutzername ein';
		} elseif ( empty($password) ) { $request->status = 'warning';
			$request->message = 'Bitte gib ein Passwort ein';
		} elseif ( empty($confirm) ) { $request->status = 'warning';
			$request->message = 'Bitte wiederhole das Passwort';
		} elseif ( $confirm !== $password ) { $request->status = 'warning';
			$request->message = 'Das Passwort wurde nicht korrekt wiederholt';
		} else { $request->status = 'success';
			$request->message = 'Du hast Dich erfolgreich registriert';
		}
		if ( $request->status !== 'success' ) { return; }
		if ( $config->encrypt ) { $password = md5($password); }
		$userdata = ['email'=>$email,'username'=>$username,'password'=>$password];
		$this->users[$email] = new User($userdata);
		$this->saveUsers($config->userfile);
	}
	public function login($request) { global $config;
		if ( ! $this->read and empty($this->users) ) {
			$this->readUsers($config->userfile);
		} $email = $request->email; $password = $request->password;
		if ( $config->encrypt ) { $password = md5($password); }
		if ( isset($_SESSION['active']) ) { $request->status = 'warning';
			$request->message = 'Du bist bereits angemeldet';
		} elseif ( empty($email) ) { $request->status = 'warning';
			$request->message = 'Bitte gib Deine E-Mail-Adresse ein';
		} elseif ( empty($password) ) { $request->status = 'warning';
			$request->message = 'Bitte gib Dein Passwort ein';
		} elseif ( ! array_key_exists($email,$this->users) ) {
			$request->status = 'warning';
			$request->message = 'Es gibt keinen Benutzer mit dieser E-Mail-Adresse';
		} elseif ( $password !== $this->users[$email]->password ) {
			$request->status = 'warning';
			$request->message = 'Das eingegebene Passwort ist leider falsch';
		} else { $request->status = 'success';
			$request->message = 'Du hast Dich gerade erfolgreich angemeldet';
		} if ( $request->status === 'success' ) {
			$_SESSION['active'] = $this->users[$email]->asArray();
		}
	}
	public function profile($request) { global $config;
		if ( ! $this->read and empty($this->users) ) {
			$this->readUsers($config->userfile);
		} if ( ! isset($_SESSION['active']) ) {
			$request->message = 'Du hast Dich noch nicht angemeldet';
			return $request->status = 'warning';
		} else { $email = $_SESSION['active']['email']; }
		if ( ! array_key_exists($email,$this->users) ) {
			$request->message = 'Dein Benutzerkonto ist ungültig';
			return $request->status = 'error';
		} $request->addData($this->users[$email]->asArray());
	}
	public function logout($request) {
		if ( ! isset($_SESSION['active']) ) {
			$message = 'Du bist gerade gar nicht angeldet';
			$request->status = 'warning'; return $request->message = $message;
		} else { unset($_SESSION['active']);
			$message = 'Du hast Dich erfolgreich abgemeldet';
			$request->status = 'success'; return $request->message = $message;
		}
	}
} // end of class Users

class User { // really required? only associative array?
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
	public function asArray($password=False) {
		$userarray = ['email'=>$this->email,'username'=>$this->username];
		if ( $password ) { $userarray['password'] = $this->password; }
		return $userarray;
	}
} // end of class User

?>
