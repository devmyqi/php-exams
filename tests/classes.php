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
	public function __get($prop) {
		$object_vars = get_object_vars($this); $class_vars = get_class_vars('Test');
		if ( array_key_exists($prop,$object_vars) ) { return $this->$prop;
		} elseif ( array_key_exists($prop,$class_vars) ) { return $class_vars[$prop];
		} else { return Null; }
	}
}

$test0 = new Test();
$test1 = new Test('one');

# echo $test1->count . "\n";

print_r(get_class_vars('Test'));
print_r(get_object_vars($test0));

echo "undef: " . $test1->undef . "\n";
echo "name: " . $test1->name . "\n";
echo "count: " . $test1->count . "\n";

?>
