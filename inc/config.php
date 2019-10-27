<?php

/*	meta information
	filename: inc/config.php
	description: config class for exams
	version: v0.0.1
	author: Michael Wronna, Konstanz
	created: 2019-10-27
	modified: 2019-10-27
*/

require_once('inc/meta.php');

class Config extends Meta {
	public function __construct () {
		$this->_log(1,'new <Config> object initialized');
	}
} // end of class Config

?>
