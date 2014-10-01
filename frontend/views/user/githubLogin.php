<?php
require_once(Yii::app()->params['thirdloginlib'].'github-api-php-client/Githubv2.php');

$cbk = MyRequest::get_singleton()->createUrl('/user/oauth', array('github'=>'reg'));
$oauth = new OAuth(Yii::app()->params['githubA_KEY'], Yii::app()->params['githubS_KEY']);
if(isset($_GET['code']))
{
	if($oauth->getState()===$_GET['state'])
	{
		$token = $oauth->getAccessToken($_GET['code'], $cbk);
		$api = new Github($oauth, $token);
		$profile = $api->api('user');
		var_export(json_decode($profile, true));
	}else{
		throw new OAuthException('state not match');
	}
}else{
	$authURL = $oauth->getAuthorizeURL($cbk);
	echo $authURL,"<br>";
	
	printf('<a target="_blank" href="%s">登录Github</a>', $authURL);
}