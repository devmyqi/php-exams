<?php

class Test {
	public static $count = 0;
	public $name;
	public function __construct($name='none') {
		$this->name = $name;
		$this::$count += 1;
		$count = $this::$count;
		echo ">>> init Test($count): $this->name\n";
	}
	public function _get($prop) {
		if ( isset($this::$prop) ) {
			return 'cp' . $this->$prop;
		} elseif ( isset($this->prop) ) {
			return $this->$prop;
		} elseif ( $prop === 'w' ) {
			return 'äätsch';
		} else { return 'undefined'; }
	}
}

$test0 = new Test();
$test1 = new Test('one');

echo $test1->count;

?>