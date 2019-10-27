<?php

/*	meta information
	filename: inc/meta.php
	description: config and meta class for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-25
	modified: 2019-10-27
*/

class Config {
	public $loglevel = 63;
	public $logdate = 'H:i:s.u';
	public $logtypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	public $logformat = '$created [$logtype] ($level) $message';
	public $logtarget = 'terminal'; // console,website,terminal
}

class Meta {
	public function _log($level,$message) {
		// if ( ! isset($this->config) ) { $this->config = new Config(); }
		$now = new DateTime(); $created = $now->format($this->config->logdate);
		$logtype = array_key_exists($level,$this->config->logtypes)
			? $this->config->logtypes[$level] : 'undef';
		if ( $logtype === 'warning' ) { $cmd = 'warn';
		} elseif ( $logtype === 'error') { $cmd= 'error'; } else { $cmd = 'log'; }
		list($ld['$created'],$ld['$logtype'],$ld['$level'],$ld['$message'])
			= [$created,$logtype,$level,$message];
		$logformat = strtr($this->config->logformat,$ld);
		if ( $level === 16 ) { exit($logformat); }
		if ( $this->config->logtarget == 'console' ) {
			if ( $logtype === 'warning' ) { $cmd = 'warn';
			} elseif ( $logtype === 'error' ) { $cmd = 'error'; } else { $cmd = 'log'; }
			$logformat = "<script>javascript: console.$cmd('$logformat');</script>\n";
		} elseif ( $this->config->logtarget === 'website' ) {
			$logformat = "<p class='$logtype'>$logformat</p>\n";
		} else { $logformat .= "\n"; }
		if ( $this->config->loglevel & $level ) { print($logformat); }
	}
} // end of class Meta

?>
