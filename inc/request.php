<?php

/*	meta information
	filename: dev/inc/request.php
	description: session class for exams
	version: v0.0.2 (new approach)
	author: Michael Wronna, Konstanz
	created: 2019-11-14
	modified: 2019-11-21
*/

class Request extends Getter {
	public $status = 'normal';
	public $message = 'this is just a message';
	// magic methods
	public function __construct($get=[],$post=[]) { global $config;
		foreach ( $post as $key => $value ) {
			if ( is_array($value) ) { continue; }
			$post[$key] = trim($post[$key]);
			if ( $key === 'email' ) {
				$post[$key] = strtolower($post[$key]);
			}
		} $this->get = $get; $this->post = $post;
		$config->_log(1,"new <Request> object initialized");
	}
	public function __get($prop) {
		if ( array_key_exists($prop,$this->post) ) {
			return $this->post[$prop];
		} else { return parent::__get($prop); }
	}
	public function addData($data) {
		foreach ( $data as $key => $value ) {
			$this->post[$key] = $value;
		}
	}
} // end of class Request

?>
