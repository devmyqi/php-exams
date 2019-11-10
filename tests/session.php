<?php

session_start();

// session_destroy(); $_SESSION = Null;

require_once('inc/config.php');

if ( ! isset($_SESSION['config']) ) { require('init.php');
}
$config = $_SESSION['config'];

echo '<pre>';
print_r($config);
echo '</pre>';

?>
