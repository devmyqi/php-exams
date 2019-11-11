<?php


session_start();

// session_destroy();

# $_SESSION = Null;

class Config {
	public $appName = 'something';
	public $userActive = False;
	public function __construct() {
		$this->created = date('Y-m-d H:i:s');
		$this->userActive = new User();
	}
}

class User {
	public $email = 'mike@myqs.net';
	public $username = 'Michael Wronna';
	public $password = 'geheim';
	public function __construct() {
		$this->created = date('Y-m-d H:i:s');
	}
}

if ( ! isset($_SESSION['config']) ) {
	echo "config create<br/>\n";
	$config = new Config();
	$_SESSION['config'] = $config;
} else {
	echo "config in session<br/>\n";
	$config = $_SESSION['config'];
}

echo "<pre>\n";
print_r($config);
echo "</pre>\n";

?>