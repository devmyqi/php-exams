<?php

$fibonacci = [0,1,1,2,3,5,8,13,21,34,55,89,144,233];
$numbers = ['one','two','three','four','five','six'];

next($numbers);
next($numbers);
$current = current($numbers);
echo "current: $current\n";

?>
