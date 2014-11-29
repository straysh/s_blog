<?php
$main = array(
	'frontUrl' => 'http://www.straysh.com',
	'thirdloginlib' => '/data2/thirdLogin/',
	'weiboA_KEY' => '3882062324',
	'weiboS_KEY' => '6f5652939c145f860afefd1b143b82f0',
	'qqA_KEY' => '801283726',
	'qqS_KEY' => 'de4222769ee85766ad5de42de1c2ae50',
	'googleA_KEY' => '156506359209.apps.googleusercontent.com',
	'googleS_KEY' => 'vWHrNXHtJ5HcAwjgXYcA9gBH',
	'googleD_KEY' => 'AIzaSyD9td0ItGeEhjn7puFw_33vrQhUiYkGdEA',
	'githubA_KEY' => '743c807e51a95a47a9d7',
	'githubS_KEY' => '9369b299ac210cfdd33888ffe03549b0f56f08b7',

	'GOOGLE'        => array(
		'WEBSERVER' => array(
			'LIB'           => '/data0/library/php/thirdLogin/google-api-php-client-read-only/src',
			'CLIENT_ID'     => '147600874787-9i1jo2iaju2kd2v292s6081n53ikq3n3.apps.googleusercontent.com',
			'CLIENT_SECRET' => 'DZP7K-4hd4UUsswokn9ynOGH',
			'REDIRECTURI'   => 'http://www.straysh.info/test/googlelogindemostep2',
		)
	),

	'captcha_google' => array(
		'class' => '/data0/library/php/captcha/recaptcha-php-1.11/recaptchalib.php',
		'public_key' => '6LeTa-8SAAAAAMaP2zdU0_lW46wo9lODnkqXkkGG',
		'private_key' => '6LeTa-8SAAAAACgp-3JnZlki19wBoAA0zFJ2tB3B',
		'doc' => 'https://developers.google.com/recaptcha/docs/php?csw=1',
	),
	'thecaptcha' => array(
		'class' => '/data0/library/php/captcha/thecaptcha/captcha.function.php',
		'doc' => 'http://www.thecaptcha.com/',
	),
	'3dcaptcha' => array(
		'class' => '/data0/library/php/captcha/3Dcaptcha/captcha3D.php',
		'doc' => 'https://github.com/intval/3Dcaptcha',
		'doc2' => 'http://www.3dcaptcha.net/',
	),
	'3dcaptchav2' => array(
		'pre_class' => '/data0/library/php/captcha/3dCaptcha-1.0.0/src/TextGen.php',
		'class' => '/data0/library/php/captcha/3dCaptcha-1.0.0/src/3DCaptcha.php',
		'doc' => 'https://code.google.com/p/3dcaptcha/',
	),
	'quickcaptcha' => array(
		'class' => '/data0/library/php/captcha/quickcaptchav1.0/imagebuilder.php',
		'doc' => 'http://www.web1marketing.com/resources/tools/quickcaptcha/',
	),
);
$local = dirname(__FILE__).'/params_local.php';
return file_exists($local) ? array_merge($main, require($local)) : $main;