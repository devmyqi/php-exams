<?php

class Super {
	public $pid = 0;
	static public $sid = 1;
}

class Child extends Super {
	public $cid = 0;
	public function test() {
		$sid = parent::$sid;
		echo "child id: $this->cid\n";
		echo "super id: $sid\n";
	}
}


class Defaults {
	protected $defaults = [
		'did' => 0,
		'name' => 'none',
		'created' => 'False',
	];
	public function __construct() {
		foreach ( $this->defaults as $prop => $value ) { 
			$this->$prop = $value;
		}
	}
}

# $child = new Child(); $child->test();

$defaults = new Defaults();
$test = print_r($defaults,True);
# print_r($test);
print($defaults->defaults);


?>
