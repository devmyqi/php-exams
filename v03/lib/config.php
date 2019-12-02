<?php

// vim-marks: s=Super,l=Logger,c=Config

/*	meta information
	filename: v03/lib/config.php
	description: config class for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-12-02
*/

trait Super {
	// setter, getter, tools
	private $jsonOptions = JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES;
	public function asJson() {
		return json_encode($this,$this->jsonOptions);
	}
} // end of trait Super

trait Logger {
	private $logLevel = 63;
	private $logDate = 'H:i:s.u';
	private $logTypes = [1=>'info',2=>'info',4=>'info',8=>'warning',16=>'error',32=>'debug'];
	private $logExit = 16;
	private $logFormat = '$logCreated [$logType] ($level) $message';
	private $logTarget = 'console';
	private $logFormats = [
		'console' => '<script>console.log("$logString");</script>' . "\n",
		'terminal' => '$logString' . "\n",
		'website' => '<p class="log">$logString</p>' . "\n",
	];
	public function _log(int $level, string $message) {
		$now = new DateTime(); $logCreated = $now->format($this->logDate);
		$logType = array_key_exists($level,$this->logTypes) ? $this->logTypes[$level] : 'undef';
		$logData = ['$logCreated'=>$logCreated,'$logType'=>$logType,
			'$level'=>$level,'$message'=>$message];
		$logString = strtr($this->logFormat,$logData);
		if ( $this->logExit & $level ) { exit($logString); }
		if ( array_key_exists($this->logTarget,$this->logFormats) ) {
			$logFormat = $this->logFormats[$this->logTarget];
		} else { $logFormat = $this->logFormats['console']; }
		if ( $this->logLevel & $level ) { echo str_replace('$logString',$logString,$logFormat); }
	}
} // end of trait Logger

class Config {
	use Super;
	use Logger;
	static private $iniRead = False;
	static private $configs = [];
	static private $defaults = [
		'confid' => 'default',
		'description' => 'no description for this configuration',
		'iniFile' => 'settings.ini',
		'dataFiles' => 'data/03*.md',
		'dataHashLength' => 4,
		'userFile' => 'data/users.json',
		'baseType' => 'sqlite3',
		'baseFile' => 'data/v03.sqlite3',
		'skinDir' => 'skins',
		'siteName' => 'exams?',
	];
	// magic methods
	public function __construct(array $data=[]) {
		foreach ( array_merge(self::$defaults,$data) as $attrib => $value ) {
			$this->$attrib = $value;
		} $this->_log(1,"new Config: $this->confid ($this->logLevel)");
		if ( empty(self::$configs) ) {
			$this->description = 'default configuration set by the program';
		} self::$configs[$this->confid] = $this;
		if ( self::$iniRead === FALSE ) { $this->readIniFile($this->iniFile); }
	}
	public function __toString() {
		$printFormat = "$this->confid: $this->description ($this->logLevel)\n";
		return $printFormat;
	}
	// basic methods
	private function _copy(array $data=[]) { $config = clone($this);
		foreach ( $data as $attrib => $value ) { $config->$attrib = $value; }
		$this->_log(2,"copied Config '$this->confid' into Config '$config->confid'");
		self::$configs[$config->confid] = $config; return $config;
	}
	private function readIniFile(string $iniFile) {
		if ( ! is_file($iniFile) or ! is_readable($iniFile) ) {
			return $this->_log(8,"unable to read configurations from: $iniFile");
		} $this->_log(2,"reading configurations from file: $iniFile");
		self::$iniRead = True; $config = current(self::$configs); $addMode = 'copy';
		foreach ( file($iniFile) as $configLine ) {
			$configLine = preg_replace('/\s*\#+\s+(.*)$/','',trim($configLine));
			if ( strlen($configLine) <= 3 ) { continue; }
			if ( preg_match('/^\[([\w\-\.]+)\]$/',$configLine,$result) ) { // config
				if ( ! array_key_exists($result[1],self::$configs) ) {
					if ( $addMode === 'default' ) { $config = new Config(['confid'=>$result[1]]);
					} else { $config = $config->_copy(['confid'=>$result[1]]); }
				} else { $config = self::$configs[$result[1]]; }
			} elseif ( preg_match('/^([\w\-\.]+)\s*\:\s*(.*)$/',$configLine,$result) ) {
				$attrib = $result[1]; $value = $result[2]; $config->$attrib = $value;
				// echo ">>> setting: $attrib => $value\n";
			} elseif ( preg_match('/^\@([\w\-\.]+)\s*(.*)$/',$configLine,$result) ) {
				$action = $result[1]; $argument = $result[2];
				if ( in_array($action,['copy','default']) ) { $addMode = $action;
				} elseif ( $action === 'apply' ) { $this->applyConfig($argument);
				} else { $this->_log(8,"undefined action in configuration: $action($argument)"); }
			} else { $this->_log(8,"unable to parse configuration: $configLine"); }
		}
	}
	public function applyConfig($confid) {
		if ( ! array_key_exists($confid,self::$configs) ) {
			return $this->_log(8,"unable to apply missing configuration: $confid");
		} $this->_log(2,"applying configuration as default: $confid");
		$config = self::$configs[$confid];
		foreach ( get_object_vars($config) as $attrib => $value ) {
			if ( $attrib !== 'confid' ) { $this->$attrib = $value; }
		}
	}
	// output methods, cli only #debug
	public function printConfigs() {
		$this->_log(2,"printing the formatted list of all configurations");
		foreach ( self::$configs as $config ) { print($config); }
	}
} // end of class Config

?>
