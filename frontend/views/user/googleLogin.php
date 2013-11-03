<?php
require_once(Yii::app()->params['thirdloginlib'].'google-api-php-client-read-only/src/Google_Client.php');
require_once(Yii::app()->params['thirdloginlib'].'google-api-php-client-read-only/src/contrib/Google_Oauth2Service.php');

$redirectUrl = 'http://www.straysh.info/user/oauth/google/reg';
$client = new Google_Client();
$client->setApplicationName('straysh-blog');
$client->setRedirectUri($redirectUrl);
$client->setClientId(Yii::app()->params['googleA_KEY']);
$client->setClientSecret(Yii::app()->params['googleS_KEY']);
$client->setDeveloperKey(Yii::app()->params['googleD_KEY']);
$oauth2 = new Google_Oauth2Service($client);

if(isset($_GET['code']))
{
	$client->authenticate($_GET['code']);
// 	$token = $client->getAccessToken();
// 	$client->setAccessToken($token);
	$user = $oauth2->userinfo->get();
	var_export($user);
}else{
	$url = $client->createAuthUrl();
	
	echo $url,"<br>";
	
	printf('<a target="_blank" href="%s">登录Google</a>', $url);
}