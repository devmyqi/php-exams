<?php

/*	meta information
	filename: dev/index.php
	description: new approch, index file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-13
	notes: use globals, only data in session!
*/

session_start();

// requires
require_once('inc/config.php');
require_once('inc/site.php');
require_once('inc/users.php');
require_once('inc/courses.php');

// session keys, to avoic conflicts between versions
$sitekey = 'site_v02d';

// reset
# session_destroy();
# $_SESSION = Null;

// config, init one, use global
$config = new Config(); // logtarget=>console
global $config; // not needed, just a hint

// site, stores all data objects
$site = new Site();
if ( ! isset($_SESSION[$sitekey]) ) {
	$_SESSION[$sitekey] = $site->asArray();
}

// users
$users = new Users();

// load skin

require_once("$config->skindir/index.php");

echo "<pre>\n"; print_r($_SESSION[$sitekey]); echo "</pre>\n";

?>
