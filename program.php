<?php

/*	meta information
	filename: program.php
	description: program (cli) class for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-27
*/

require_once('inc/meta.php');
require_once('inc/data.php');

class Program extends Meta {
	public $name = 'exams';
	public $version = 'v0.0.1';
	public function __construct($config) {
		$this->config = $config;
		$this->_log(1,'new <Program> object initialized');
		$this->data = new Data($config,'data/exams.md');
		array_shift($_SERVER['argv']);
		while ( count($_SERVER['argv']) ) {
			$argument = array_shift($_SERVER['argv']);
			if ( preg_match('/^\-\w+$/',$argument) ) { $this->options($argument);
			} elseif ( $argument == '--version' ) { $this->printVersion();
			} else { $this->_log(8,"undefined program argument: $argument"); }
		} // end processing arguments
	}
	protected function options($argument) {
		$options = str_split($argument);
		$prefix = array_shift($options);
		while ( count($options) ) {
			$option = array_shift($options);
			if ( $option == 'v' ) { $this->printVersion();
			} elseif ( $option == 't' ) { $this->data->printTree();
			} elseif ( $option == 'T' ) { echo $this->data->htmlTree();
			} else { $this->_log(8,"undefined program option: $option"); }
		} // end processing options
	}
	protected function printVersion() {
		$this->_log(2,"printing the programs version number");
		printf('%s %s',$this->name,$this->version);
	}
} // end of class Program

$config = new Config();
$program = new Program($config);

?>
