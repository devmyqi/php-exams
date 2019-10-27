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

class Program extends Meta {
	public $name = 'exams';
	public $version = 'v0.0.1';
	public function __construct() {
		$this->_log(1,'new <Program> object initialized');
	}
} // end of class Program

?>
