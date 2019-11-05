<?php

session_start();

// config loaded in site.php
require_once('inc/site.php');
$site = new Site(); $_SESSION['site'] = $site;
$config = $_SESSION['config'];

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

// register();
// authenticate();

print_r($site);
	
?>