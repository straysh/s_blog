<?php
$main = array(
	'frontUrl' => 'http://www.straysh.com',
	'longlib' => '',
	'weiboA_KEY' => '3882062324',
	'weiboS_KEY' => '6f5652939c145f860afefd1b143b82f0',
	'qqA_KEY' => '801283726',
	'qqS_KEY' => 'de4222769ee85766ad5de42de1c2ae50',
	'googleA_KEY' => '156506359209.apps.googleusercontent.com',
	'googleS_KEY' => 'vWHrNXHtJ5HcAwjgXYcA9gBH',
	'googleD_KEY' => 'AIzaSyD9td0ItGeEhjn7puFw_33vrQhUiYkGdEA',
	'githubA_KEY' => '743c807e51a95a47a9d7',
	'githubS_KEY' => '9369b299ac210cfdd33888ffe03549b0f56f08b7',
	);
$local = dirname(__FILE__).'/params_local.php';
return file_exists($local) ? array_merge($main, require($local)) : $main;