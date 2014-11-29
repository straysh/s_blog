<?php
if(!isset($_GET['code']))
{
	echo ("authentication code 丢失!");
	return;
}

echo "<content>";
$text = <<<DEMO
```php
\$config = Yii::app()->params['GOOGLE']['WEBSERVER'];
require_once (\$config['LIB'].'/Google_Client.php');
require_once (\$config['LIB'].'/contrib/Google_Oauth2Service.php');

\$client = new Google_Client();
\$oauth2 = new Google_Oauth2Service(\$client);
\$client->setApplicationName('appTest Google APIs');
\$client->setClientId(\$config['CLIENT_ID']);
\$client->setClientSecret(\$config['CLIENT_SECRET']);
\$client->setRedirectUri(\$config['REDIRECTURI']);

\$client->authenticate(\$_GET['code']);
\$accessToken = \$client->getAccessToken();
try{
	\$profile = \$oauth2->userinfo->get();
	echo "<pre>";
	var_export(\$profile);
	echo "</pre>";
}catch (Exception \$e)
{
	var_dump(\$e->getMessage());
}
```
***
DEMO;

$parseDown = new Parsedown();
$content = $parseDown->text($text);
echo "{$content}";

$config = Yii::app()->params['GOOGLE']['WEBSERVER'];
require_once ($config['LIB'].'/Google_Client.php');
require_once ($config['LIB'].'/contrib/Google_Oauth2Service.php');

$client = new Google_Client();
$oauth2 = new Google_Oauth2Service($client);
$client->setApplicationName('appTest Google APIs');
$client->setClientId($config['CLIENT_ID']);
$client->setClientSecret($config['CLIENT_SECRET']);
$client->setRedirectUri($config['REDIRECTURI']);

$client->authenticate($_GET['code']);
$accessToken = $client->getAccessToken();
try{
	$profile = $oauth2->userinfo->get();
	echo "<pre>";
	var_export($profile);
	echo "</pre>";
}catch (Exception $e)
{
	var_dump($e->getMessage());
}