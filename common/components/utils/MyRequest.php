<?php
class MyRequest
{
	private static $_instance;
	
	private function __construct(){}
	
	public static function get_singleton()
	{
		if(!isset(self::$_instance))
		{
			$c = __CLASS__;
			self::$_instance = new $c;
		}
		return self::$_instance;
	}
	
	public function createUrl($route,$params=array(),$ampersand='&', $base = 'frontUrl')
	{
// 		return Yii::app()->params[$base].Yii::app()->createUrl($route, $params, $ampersand);
		return preg_replace('#^http://admin.#','http://www.', Yii::app()->request->hostinfo.Yii::app()->createUrl($route, $params, $ampersand));
	}
}