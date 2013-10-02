<?php
$main = array(
	'frontUrl' => 'http://www.straysh.com',
	);
$local = dirname(__FILE__).'/params_local.php';
return file_exists($local) ? array_merge($main, require($local)) : $main;