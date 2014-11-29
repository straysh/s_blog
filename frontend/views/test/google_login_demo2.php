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
\$client->setApplicationName('appTest Google APIs');
\$client->setClientId(\$config['CLIENT_ID']);

\$client->authenticate(\$_GET['code']);
\$accessToken = \$client->getAccessToken();
\$oauth2 = new Google_Oauth2Service(\$client);
\$profile = \$oauth2->userinfo->get();
var_dump(\$profile);
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
$client->setApplicationName('appTest Google APIs');
$client->setClientId($config['CLIENT_ID']);
$client->setClientId($config['CLIENT_SECRET']);

$client->authenticate($_GET['code']);
$accessToken = $client->getAccessToken();
$oauth2 = new Google_Oauth2Service($client);
$profile = $oauth2->userinfo->get();
var_dump($profile);