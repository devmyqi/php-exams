<?php

/*	meta information
	filename: dev/inc/config.php
	description: config class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-05
	notes: static copy of config.php
*/

class Config {
	// logging
	public $loglevel = 63;
	public $logdate = 'H:i:s.u';
	public $logtypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	public $logformat = '$created [$logtype] ($level) $message';
	public $logtarget = 'console'; // console,website,terminal
	// site
	public $sitename = 'exams';
	public $skindir = 'skins';
	// users
	public $userfile = 'users.json';
	public $encrypt = True;
	// courses
	// pages
	public function __construct($logtarget='console') {
		$this->logtarget = $logtarget;
		$this->_log(1,'new <Config> object initialized');
	}
	public function _log($level,$message) {
		$now = new DateTime(); $created = $now->format($this->logdate);
		$logtype = array_key_exists($level,$this->logtypes)
			? $this->logtypes[$level] : 'undef';
		if ( $logtype === 'warning' ) { $cmd = 'warn';
		} elseif ( $logtype === 'error') { $cmd= 'error'; } else { $cmd = 'log'; }
		list($ld['$created'],$ld['$logtype'],$ld['$level'],$ld['$message'])
			= [$created,$logtype,$level,$message];
		$logformat = strtr($this->logformat,$ld);
		if ( $level === 16 ) { exit($logformat); }
		if ( $this->logtarget == 'console' ) {
			if ( $logtype === 'warning' ) { $cmd = 'warn';
			} elseif ( $logtype === 'error' ) { $cmd = 'error'; } else { $cmd = 'log'; }
			$logformat = "<script>javascript: console.$cmd('$logformat');</script>\n";
		} elseif ( $this->logtarget === 'website' ) {
			$logformat = "<p class='$logtype'>$logformat</p>\n";
		} else { $logformat .= "\n"; }
		if ( $this->loglevel & $level ) { print($logformat); }
	}
} // end of class Config

?>
