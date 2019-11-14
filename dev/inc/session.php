<?php

/*	meta information
	filename: dev/inc/session.php
	description: session class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-14
	modified: 2019-11-14
*/

class Session extends Getter {
	public $status = 'normal';
	public $message = 'this is just a message';
	public $active = False; // active user object
	public function __construct($get=[],$post=[]) { global $config;
		$this->get = $get; $this->post = $post;
		if ( array_key_exists('email',$this->post) ) {
			$this->post['email'] = strtolower($this->post['email']);
		} $config->_log(1,"new <Session> object initialized");
	}
	public function __get($prop) {
		if ( array_key_exists($prop,$this->post) ) {
			return $this->post[$prop];
		} else { return parent::__get($prop); }
	}
} // end of class Session

?>
