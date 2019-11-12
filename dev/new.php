<?php

/*	meta information
	filename: dev/new.php
	description: new approach, tests
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-12
*/

require_once('inc/site.php');
session_start();

function loadSite() {
	if ( ! isset($_SESSION['site']) ) {
		$site = new Site(); $_SESSION['site'] = $site;
	} else { $site = $_SESSION['site']; }
}

$site = new Site(); // test

print_r($site->config);

?>
