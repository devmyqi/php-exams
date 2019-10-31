<?php

/*	meta information
	filename: config.php
	description: configuration for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-29
	modified: 2019-10-30
	notes: the config shouls be available everywhere
*/

class Config {
	// meta
	public $source = 'init';
	// logging
	public $loglevel = 63;
	public $logdate = 'H:i:s.u';
	public $logtypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	public $logformat = '$created [$logtype] ($level) $message';
	public $logtarget = 'terminal'; // console,website,terminal
	// data
	public $files = 'exams/01*.md';
	// interface
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

