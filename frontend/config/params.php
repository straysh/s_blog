<?php
$main = array(
);
return file_exists($local) ? array_merge($main, require(dirname(__FILE__).'/params_local.php')) : $main;