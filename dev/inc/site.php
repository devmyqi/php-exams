<?php

/*	meta information
	filename: dev/inc/site.php
	description: new approach, site class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-14
	notes: this is the main class, holding all data (config is global)
*/

class Site {
	protected $defaults = [
		// properties
		'sid' => 'home',
		'name' => 'exams?',
		'version' => 'v0.0.2 (alpha2) [dev]',
		'title' => 'homepage',
		'content' => 'empty',
		'initdate' => False,
	];
	public function __construct($data=[]) { global $config;
		foreach ( $this->defaults as $prop => $value ) {
			if ( property_exists($config,$prop) ) {
				$this->$prop = $config->$prop;
			} elseif ( array_key_exists($prop,$data) ) {
				$this->$prop = $data[$prop];
			} else { $this->$prop = $value; }
		}
		$config->_log(1,"new Site: $this->name ($this->sid)");
		$this->initdate = date('Y-m-d H:i:s'); // debug
		$this->formhandler();
		$this->routing();
	}
	// static functions
	static function _getTemplate($template) { global $config, $templates;
		require_once("$config->skindir/templates.php");
		if ( array_key_exists($template,$templates) ) { $template = $templates[$template]; }
		if ( is_readable("$config->skindir/$template") ) {
			$template = file_get_contents("$config->skindir/$template");
		} elseif ( is_readable($template) ) { $template = file_get_contents($template);
		} return $template;
	}
	static function _format($object,$template,$single=False) {
		$template = Site::_getTemplate($template);
		if ( is_array($object) and $single ) { // assoc array
			preg_match_all('/\$(\w+)/',$template,$result); $replace = [];
			foreach ( $result[1] as $key ) {
				if ( array_key_exists($key,$object) ) {
					$replace['$'.$key] = $object[$key];
				} else { $replace['$'.$key] = ''; }
			} return strtr($template,$replace);
		} elseif ( is_array($object) ) { $formatted = "";
			foreach ( $object as $item ) {
				$formatted .= Site::_format($item,$template);
			} return $formatted;
		} elseif ( is_object($object) ) {
			preg_match_all('/\$(\w+)/',$template,$result); $replace = [];
			foreach ( $result[1] as $key ) {
				try { $replace['$'.$key] = $object->$key;
				} catch ( exception $e ) { $replace['$'.$key] = '-'; }
			} return strtr($template,$replace);
		} else { return sprintf($template,$object); }
	}
	// protected functions
	protected function formhandler() {
		echo "formhandler";
	}
	protected function errorPage($template) {
		$this->sid = 'error'; $this->title = 'Fehler';
		$this->content = Site::_format($this,'siteMissing');
	}
	protected function routing() {
		$get = isset($_GET) ? $_GET : [];
		// default route
		if ( empty($get) ) {
			$this->sid = 'welcome'; $this->title = 'Willkommen';
			$this->content = Site::_format($this,'siteWelcome');
		// user routes
		} elseif ( isset($get['register']) ) {
			$this->sid = 'register'; $this->title = 'Registration';
			$this->content = Site::_format($_POST,'userRegister',True);
		} elseif ( isset($get['login']) ) {
			$this->sid = 'login'; $this->title = 'Anmelden';
			$this->content = Site::_format($_POST,'userLogin',True);
		// debug routes
		} else { return $this->errorPage('siteMissing'); }
	}
	// public functions
	// debug functions
	public function asArray() { $data = []; // stores site data in session
		foreach ( array_keys($this->defaults) as $prop ) {
			$data[$prop] = $this->$prop;
		} return $data;
	}
} // end of class Site

?>
