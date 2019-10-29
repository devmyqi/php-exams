<?php

/*	meta information
	filename: config.php
	description: configuration for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-29
	modified: 2019-10-29
*/

class Config {
	// logging
	public $loglevel = 63;
	public $logdate = 'H:i:s.u';
	public $logtypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	public $logformat = '$created [$logtype] ($level) $message';
	public $logtarget = 'terminal'; // console,website,terminal
	// data
	public $files = 'data/test.md';
}

?>