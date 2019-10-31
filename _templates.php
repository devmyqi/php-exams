<?php

/*	meta information
	filename: _templates.php
	description: html templates for exams
	version: v0.0.2
	author: Michael Wronna, Konstanz
	created: 2019-10-31
	modified: 2019-10-31
*/

$templates = [];

// test templates

$templates['testOne'] = '<p>i am only: $var1 ($var2) [$invalid]</p>\n';
$templates['testTwo'] = 'template: $name (id=$id) [?$invalid]';

// site templates

$templates['siteFooter'] = 'exams (v0.0.2) &copy; $modified (M.Wronna)';

// course templates

$templates['coursePreview'] = <<<'EOS'
	<h3>$topic</h3>
	$content
	<p class='courselink'>links</p>
EOS;

?>
