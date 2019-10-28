<?php

/*	meta information
	filename: program.php
	description: program (cli) class for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-28
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
			// program arguments
			} elseif ( $argument == '--version' ) { $this->printVersion();
			// config arguments
			// course arguments
			// question arguments
			} else { $this->_log(8,"undefined program argument: $argument"); }
		} // end processing arguments
	}
	protected function options($argument) {
		$options = str_split($argument);
		$prefix = array_shift($options);
		while ( count($options) ) {
			$option = array_shift($options);
			// program options
			if ( $option == 'v' ) { $this->printVersion();
			} elseif ( $option == 'h' and count($_SERVER['argv']) ) {
				$this->printHelp(array_shift($_SERVER['argv']));
			} elseif ( $option == 'h' ) { $this->printHelp();
			// config options
			// course options
			// question options
			// debug options
			} elseif ( $option == 'd' ) {
				print_r($this->data->courseID('just a test'));
			} elseif ( $option == 't' ) { $this->data->printTree();
			} elseif ( $option == 'T' ) { echo $this->data->htmlTree();
			} else { $this->_log(8,"undefined program option: $option"); }
		} // end processing options
	}
	protected function printVersion() {
		$this->_log(2,"printing the programs version number");
		printf('%s %s',$this->name,$this->version);
	}
	protected function printHelp($section='all') {
		$sections = ['program','config','course','question'];
		if ( ! in_array($section,$sections) ) { $section = 'all'; }
		$this->_log(2,"printing the help page for section: $section");
		if ( in_array($section,['all','program']) ) { // program help
			print("program arguments and option (section=program)\n");
			print("  -v,--version        print the programs version number\n");
			print("  -h,--help           print this little help page\n");
		}
		if ( in_array($section,['all','config']) ) { // config help
			print("config arguments and option (section=config)\n");
		}
		if ( in_array($section,['all','course']) ) { // course help
			print("course arguments and option (section=course)\n");
		}
		if ( in_array($section,['all','question']) ) { // question help
			print("question arguments and option (section=question)\n");
		}
	}
} // end of class Program

$config = new Config();
$program = new Program($config);

?>
