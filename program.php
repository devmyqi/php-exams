<?php

/*	meta information
	filename: program.php
	description: program interface for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-08
	modified: 2019-11-09
*/

session_start();

// config
require_once('inc/config.php');
$config = new Config(['logtarget'=>'terminal']);
$_SESSION['config'] = $config;

// site
require_once('inc/site.php');
$site = new Site();
$_SESSION['site'] = $site;

class Program {
	public $progname = 'exams';
	public $version = 'v0.0.2';
	public function __construct() { global $config;
		$config->_log(1,"new Program: $this->progname ($this->version)");
		array_shift($_SERVER['argv']);
		while ( count($_SERVER['argv']) ) {
			$argument = array_shift($_SERVER['argv']);
			if ( preg_match('/^\-\w+$/',$argument) ) { $this->_options($argument);
			// program arguments
			} elseif ( $argument == '--version' ) { $this->printVersion();
			} else { $config->_log(8,"undefined program argument: $argument"); }
		}
	}
	protected function _options($argument) { global $config;
		$options = str_split($argument);
		$prefix = array_shift($options);
		while ( count($options) ) {
			$option = array_shift($options);
			// program options
			if ( $option == 'v' ) { $this->printVersion();
			} elseif ( $option == 'h' ) { $this->printHelp();
			// config options
			// users options
			// course options
			} elseif ( $option == 'l' ) { $this->courseList();
			} else { $config->_log(8,"undefined program option: $option"); }
		}
	}
	public function startShell() { global $config;
		$config->_log(2,"starting the interactive program shell");
	}
	public function printVersion() { global $config;
		$config->_log(2,"printing the programs version number");
		print("$this->progname $this->version\n");
	}
	public function printHelp($section='all') { global $config;
		if ( ! in_array($section,['program','config','user','site','course']) ) {
			$section = 'all';
		} $config->_log(2,"printing the help page for section: $section");
		if ( in_array($section,['all','program']) ) {
			print("program arguments and options (section=program)\n");
			print("  -v,--version        print the programs version numbers\n");
			print("  -h,--help [<sec>]   print the help page for section sec\n");
		}
	}
	// users functions
	// course functions
	public function courseList() { global $config, $site;
		$config->_log(2,"printing the formatted course list");
		foreach ( $site->courses->courselist as $course ) {
			print("$course->cid: $course->title\n");
		}
	}
}

// starting the program
$program = new Program();

?>

