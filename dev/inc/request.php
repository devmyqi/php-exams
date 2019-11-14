<?php

/*	meta information
	filename: dev/inc/request.php
	description: request class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-14
	modified: 2019-11-14
*/

class Request {
	public function __construct($get=[],$post=[]) { global $config;
		$this->get = $get; $this->post = $post;
		$config->_log(1,"new <Request> object initialized");
	}
} // end of class Request

?>
