<?php
/* @var Article $articles */
$data = [];
foreach($articles as $Aarticle)
{
	$date = date('Y-m', $Aarticle->c_time);
	$data[$date][] = $Aarticle;
	$date = NULL;
}
$Aarticle = NULL;

$str = [];
foreach($data as $date => $items)
{
	$str[] = "#{$date}\n\n";
	foreach($items as $i => $Aarticle)
	{
		++$i;
		$url = Yii::app()->createUrl("/article/{$Aarticle['id']}");
		$str[] = "{$i}. [{$Aarticle->title}]({$url})\n";
	}
	$str[] = "***\n\n";
}

$str = implode('', $str);
$parseDown = new Parsedown();
$content = $parseDown->text($str);
echo "<content>{$content}</content>";