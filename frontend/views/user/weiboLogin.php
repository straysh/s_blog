<?php
require_once(Yii::app()->params['thirdloginlib'].'libweibo/saetv2.ex.class.php');

$cbk = MyRequest::get_singleton()->createUrl('/user/oauth', array('weibo'=>'reg'));
$oauth = new SaeTOAuthV2(Yii::app()->params['weiboA_KEY'] , Yii::app()->params['weiboS_KEY']);

if(isset($_GET['code']))
{
	$token = $oauth->getAccessToken('code', array('code'=>$_GET['code'], 'redirect_uri'=>$cbk));
	$uid = $token['uid'];
	$access_token = $token['access_token'];
	$api = new SaeTClientV2(Yii::app()->params['weiboA_KEY'] , Yii::app()->params['weiboS_KEY'], $access_token);
	$profile =$api->show_user_by_id($uid);
	var_export($profile);
}else{
	$code_url = $oauth->getAuthorizeURL($cbk);
	echo $code_url,"<br>";
	
	printf('<a target="_blank" href="%s">登录微博</a>', $code_url);
}