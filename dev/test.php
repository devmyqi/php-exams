<?php

session_start();

// config
require_once('inc/config.php');
$config = new Config('terminal');
$_SESSION['config'] = $config;

// site
require_once('inc/site.php');
$site = new Site();
$_SESSION['site'] = $site;

// user test functions

function register() { global $config, $site;
	$postdata = [
		'email' => 'else@someone.net',
		'username' => 'Else Someone',
		'password' => 'geheim',
		'confirm' => 'geheim',
	];
	list($status,$message) = $site->users->checkRegData($postdata);
	if ( $status === 'passed' ) {
		if ( $config->encrypt ) {
			$postdata['password'] = md5($postdata['password']);
		} $site->users->addUser(new User($postdata));
		$site->users->saveUsers($config->userfile);
	} else { $config->_log(8,"$message"); }
}

function authenticate() { global $config, $site;
	$postdata = [
		'email' => 'else@someone.net',
		'password' => 'geheim',
	];
	list($status,$message) = $site->users->checkAuthData($postdata);
	print("$status: $message\n");
}


# register()
# authenticate();

// site test functions

# echo Site::_format(1,'one.tmpl.html') . "\n";

# print_r($site->users);

# echo md5('q');
// data tests

# print_r($site->courses);
	
?>
