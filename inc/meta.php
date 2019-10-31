<?php

/*	meta information
	filename: inc/meta.php
	description: meta class for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-25
	modified: 2019-10-30
*/

require_once('config.php');
$config = isset($_SESSION['config']) ? $_SESSION['config'] : new Config();

class Meta {
	public function _log($level,$message) {
		global $config;
		$now = new DateTime(); $created = $now->format($config->logdate);
		$logtype = array_key_exists($level,$config->logtypes)
			? $config->logtypes[$level] : 'undef';
		if ( $logtype === 'warning' ) { $cmd = 'warn';
		} elseif ( $logtype === 'error') { $cmd= 'error'; } else { $cmd = 'log'; }
		list($ld['$created'],$ld['$logtype'],$ld['$level'],$ld['$message'])
			= [$created,$logtype,$level,$message];
		$logformat = strtr($config->logformat,$ld);
		if ( $level === 16 ) { exit($logformat); }
		if ( $config->logtarget == 'console' ) {
			if ( $logtype === 'warning' ) { $cmd = 'warn';
			} elseif ( $logtype === 'error' ) { $cmd = 'error'; } else { $cmd = 'log'; }
			$logformat = "<script>javascript: console.$cmd('$logformat');</script>\n";
		} elseif ( $config->logtarget === 'website' ) {
			$logformat = "<p class='$logtype'>$logformat</p>\n";
		} else { $logformat .= "\n"; }
		if ( $config->loglevel & $level ) { print($logformat); }
	}
} // end of class Meta

?>
