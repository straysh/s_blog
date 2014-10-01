<?php
$str[] = '<ul>';
/* @var Category $item */
$data = Category::model()->findAll(array(
		'condition' => '`pid`=0 AND `order` <> 0',
		'order' => ' `order` '
	));
$tpl = '<li><a href="%s" title="%s">%s (%s)</a></li>';
foreach($data as $item)
{
	$str[] = sprintf($tpl,
		Yii::app()->createUrl('/article/'.strtolower($item->nav_name)),
		$item->nav_name,
		$item->nav_name,
		$item->total );
}
$str[] = '</ul>';
echo implode('', $str);