<?php

/*	meta information
	filename: v03/tests/setter.php
	description: tests for setter v03
	version: v0.0.3
	author: Michael Wronna, Konstanz
	created: 2019-11-28
	modified: 2019-11-28
*/

class SuperClass {
	// static methods
	static function _checks(string $attrib,$value) {
		return $value;
	}
	public function _check(string $attrib,$value) {
		echo "super check: $attrib->$value\n";
		return $value;
	}
	// magic methods
	public function __set(string $attrib,$value) {
		$defaults = ! empty(static::$defaults) ? static::$defaults : [];
		$class = __CLASS__;
		echo __CLASS__;
		echo "super set: $class\n";
		if ( property_exists($this,$attrib) ) {
			# $this->$attrib = static::_checks($attrib,$value); # static check
			$this->$attrib = $this->check($attrib,$value);
		} elseif ( array_key_exists($attrib,$defaults) ) {
			# $this->$attrib = static::_checks($attrib,$value); # static check
			$this->$attrib = $this->_check($attrib,$value);
		} else { return $this->_log(8,"setter error: $attrib->$value"); }
	}
	public function __get(string $attrib) {
		if ( property_exists($this,$attrib) ) {
			return $this->$attrib;
		} elseif ( method_exists($this,$attrib) ) {
			return $this->$attrib();
		} else { return $this->_log(8,"getter error: $attrib"); }
	}
	// protected methods
	protected function _log(int $level, string $message) {
		echo "($level) $message\n";
	}
} // end of class SuperClass

trait SuperTrait {
	public function _check($attrib,$value) {
		return $value;
	}
	public function __set($attrib,$value) {
		$defaults = ! empty(self::$defaults) ? self::$defaults : [];
		if ( property_exists($this,$attrib) ) {
			$this->$attrib = $this->_check($attrib,$value);
		} elseif ( array_key_exists($attrib,$defaults) ) {
			$this->$attrib = $this->_check($attrib,$value);
		} else {
			$this->_log(8,"error super trait setter: $attrib->$value");
		}
	}
	protected function _log(int $level, string $message) {
		echo "($level) $message\n";
	}
} // end of trait SuperTrait

class Test {
	use SuperTrait;
	static protected $defaults = [
		'id' => 0,
		'name' => 'noname',
		'text' => '',
	];
	public function __construct() {
		foreach ( self::$defaults as $attrib => $value ) { $this->$attrib = $value; }
		$this->_log(1,"new Test object: ($this->id) $this->name");
		print_r($this);
	}
	// static ckecks
	static function _checks(string $attrib,$value) {
		if ( $attrib === 'id' ) { return $value += 12;
		} else { return parent::_checks($attrib,$value); }
	}
	// object check
	public function _check(string $attrib,$value) {
		if ( $attrib === 'id' ) { return $value += 12;
		} else { return $value; }
	}
} // end of class Test

$test = new Test();
$test->new = 'neu';
$test->id = 1;


print_r($test);

?>
