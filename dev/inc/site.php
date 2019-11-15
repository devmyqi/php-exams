<?php

/*	meta information
	filename: dev/inc/site.php
	description: new approach, site class
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-12
	modified: 2019-11-15
	notes: this is the main class, holding all data (config is global)
*/
// global $config, $users, $courses, $request, $site;

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
	protected function errorPage($template) {
		$this->sid = 'error'; $this->title = 'Fehler';
		$this->content = Site::_format($this,'siteMissing');
	}
	protected function routing() {
		global $config, $users, $courses, $request; // all objects!
		$get = isset($_GET) ? $_GET : []; // #todo user request
		// default route
		if ( empty($get) ) {
			$this->sid = 'welcome'; $this->title = 'Willkommen';
			$this->content = Site::_format($this,'siteWelcome');
		// auth routes
		} elseif ( isset($get['register']) ) { $users->register($request);
			$this->sid = 'register'; $this->title = 'Registration';
			$this->content = Site::_format($request,'userRegister');
		} elseif ( isset($get['login']) ) { $users->login($request);
			$this->sid = 'login'; $this->title = 'Anmelden';
			$this->content = Site::_format($request,'userLogin');
		// user routes
		} elseif ( isset($get['profile']) ) {
			$users->profile($request);
			$this->sid = 'profile'; $this->title = 'Profil';
			$this->content = Site::_format($request,'userProfile');
		} elseif ( isset($get['logout']) ) {
			$users->logout($request);
			$this->sid = 'logout'; $this->title = 'Abmelden';
			$this->content = Site::_format($request,'userLogout');
		// admin routes
		// debug routes
		} else { return $this->errorPage('siteMissing'); }
	}
	// public functions
	public function getUserMenu() {
		if ( isset($_SESSION['active']) ) {
			$userdata = $_SESSION['active'];
			return Site::_format($userdata,'siteUserMenu',True);
		} else { return Site::_format($this,'siteAuthMenu'); }
	}
	// debug functions
} // end of class Site

?>
