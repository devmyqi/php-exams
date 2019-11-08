<?php

/*	meta information
	filename: dev/inc/config.php
	description: config class new approach
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-06
*/

class Config {
	// environment
	public $configfile = 'settings.config';
	// logging
	public $loglevel = 63;
	public $logdate = 'H:i:s.u';
	public $logtypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	public $logformat = '$created [$logtype] ($level) $message';
	public $logtarget = 'console'; // console,website,terminal
	// site
	public $sitename = 'exams?';
	public $skindir = 'skins'; # unused
	// users
	public $userfile = 'users.json';
	public $encrypt = True;
	// courses
	public $coursefiles = 'courses/test.md'; # globbing
	public $hashlength = 6;
	public $previewlines = 4;
	// pages
	public function __construct($configdata) {
		$props = array_keys(get_object_vars($this));
		foreach ( $configdata as $prop => $value ) {
			if ( in_array($prop,$props) ) { $this->$prop = $value; }
		}
		if ( is_readable($this->configfile) and is_file($this->configfile) ) {
			$this->readConfig($this->configfile);
		}
		$this->_log(1,"new Config: $this->configfile [$this->loglevel] ($this->logtarget)");
	}
	protected function readConfig($configfile) { // only error logging in there
		if ( ! is_readable($this->configfile) or ! is_file($this->configfile) ) {
			return $this->_log(8,"unable to read config settings from: $configfile");
		}
		foreach ( file($configfile) as $configline ) {
			$configline = preg_replace('/\s*\#+\s+.*$/','',trim($configline));
			if ( strlen($configline) <= 3 ) { continue; }
			if ( preg_match('/^([\w\-]+)\s*\:\s*(.*)$/',$configline,$result) ) {
				$prop = $result[1]; $value = $result[2];
				$props = array_keys(get_object_vars($this));
				if ( in_array($prop,$props) ) { $this->$prop = $value; }
			} else { $this->_log(8,"unable to parse config: $configline"); }
		}
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
