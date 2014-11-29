<?php
echo "<content>";
$text = <<<DEMO
```php
\$config = Yii::app()->params['GOOGLE']['WEBSERVER'];
require_once (\$config['LIB'].'/Google_Client.php');
require_once (\$config['LIB'].'/contrib/Google_Oauth2Service.php');

\$client = new Google_Client();
\$client->setApplicationName('appTest Google APIs');
\$client->setClientId(\$config['CLIENT_ID']);
\$client->setRedirectUri(\$config['REDIRECTURI']);
\$client->setScopes("profile");
\$url = \$client->createAuthUrl();


echo "登陆URl：<br />";
echo "<p>";
printf("%s", \$url);
echo "</p><br />";

echo CHtml::link("Google登陆", \$url);
echo "</content>";
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
$client->setRedirectUri($config['REDIRECTURI']);
$client->setScopes("profile");
$url = $client->createAuthUrl();


echo "登陆URl：<br />";
echo "<p>";
printf("%s", $url);
echo "</p><br />";

echo CHtml::link("Google登陆", $url);
echo "</content>";