<?php

/*	meta information
	filename: skins/templates.php
	description: default skins template file
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-11-05
	modified: 2019-11-05
*/
$test = 'set';

$templates = [];

// site templates

// course templates

$templates['coursePreview'] = <<<'EOS'
	<li><h3>$title</h3>
		$gen
	</li>
EOS;

// question templates

// answer templates

// page templates

// test templates

$templates['one'] = 'template one in templates';

?>
