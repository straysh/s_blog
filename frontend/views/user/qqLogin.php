<?php
require_once(Yii::app()->params['thirdloginlib'].'qqweibo/Tencent.php');

$cbk = MyRequest::get_singleton()->createUrl('/user/oauth', array('qq'=>'reg'));
OAuth::init(Yii::app()->params['qqA_KEY'], Yii::app()->params['qqS_KEY']);

if(isset($_GET['code']))
{
	$url = OAuth::getAccessToken($_GET['code'], $cbk);
	$r = Http::request($url);
	parse_str($r, $out);
	var_export($out);
}else{
	$url = OAuth::getAuthorizeURL($cbk);
	
	echo $url,"<br>";
	
	printf('<a target="_blank" href="%s">登录微博</a>', $url);
}