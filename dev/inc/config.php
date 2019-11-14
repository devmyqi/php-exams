<?php

/*	meta information
	filename: dev/inc/config.php
	description: new approach, config class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-12
	notes: loaded into a site object
*/

class Getter {
	public function __get($prop) {
		$object_vars = get_object_vars($this); $class_vars = get_class_vars('Course');
		if ( property_exists($this,$prop) ) { return $this->$prop;
		} elseif ( method_exists($this,$prop) ) { return $this->$prop();
		} elseif ( array_key_exists($prop,$class_vars) ) { return $class_vars[$prop];
		} else { return Null; }
	}
}

class Config {
	public $defaults = [
		// debug
		'initdate' => False,
		// config
		'initfile' => 'settings.ini',
		// logging
		'loglevel' => 63,
		'logdate' => 'H:i:s.u',
		'logtypes' => [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'],
		'logformat' => '$created [$logtype] ($level) $message',
		'logtarget' => 'console', // console,terminal,website
		// site
		'name' => 'exams?',
		'skindir' => 'skins',
		// users
		'userfile' => 'users.json',
		'encrypt' => True,
		// courses
		'datadir' => 'data',
		'files' => '*.md',
	];
	public function __construct($data=[]) {
		foreach ( $this->defaults as $prop => $value ) {
			if ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		} $this->initdate = date('Y-d-m H:i:s');
		$this->_log(1,"new Config: $this->initfile [$this->loglevel]");
		$this->readInitFile($this->initfile);
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
	protected function readInitFile($initfile) {
		if ( ! is_readable($initfile) or ! is_file($initfile) ) {
			return $this->_log(8,"unable to read init: $initfile");
		} $this->_log(2,"reading init file: $initfile");
		foreach ( file($initfile) as $initline ) {
			$initline = preg_replace('/\s*\#+\s+(.*)$/','',trim($initline));
			if ( strlen($initline) <= 3 ) { continue; }
			if ( preg_match('/^([\w\-]+)\s*\:\s*(.*)$/',$initline,$result) ) {
				$prop = $result[1]; $value = $result[2];
				if ( property_exists($this,$prop) ) { $this->$prop = $value; }
			} else { $this->_log(8,"unable to parse init file: $initline"); }
		}
	}
} // end of class Config

?>
