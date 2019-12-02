<?php

/*	meta informationen
	filename: v03/lib/request.php
	description: request class for exams
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-12-02
	modified: 2019-12-02
	notes: is controller in MVC
*/

class Request { 
	protected $get = [];
	protected $post = [];
	public function __construct() { global $config;
		$config->_log(1,"new <Request> object initialized");
	}
} // end of class Request

?>
