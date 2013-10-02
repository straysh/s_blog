<?php
class ArticleList
{
	private static $_instance;
	private $_rawData;
	
	private function __construct()
	{
		$this->init();
	}
	
	public static function get_singleton()
	{
		if(!isset(self::$_instance))
		{
			$c = __CLASS__;
			self::$_instance = new $c;
		}
		return self::$_instance;
	}
	
	/**
	 * 返回文章列表的数组形式
	 */
	public function dataList()
	{
		if($this->rawData())
		{
			return $this->makeList();
		}
		return '';
	}
	
	private function init()
	{
		
	}
	
	private function rawData()
	{
		$this->_rawData = Article::model()->with('nav')->findAll();
		return TRUE;
	}
	
// 	$data = array(
// 		array(
// 			'text'=>'<a href="#">YII</a>',
// 			'children'=>array(
// 				array('text'=>CHtml::link('博文测试', array('/article/page/category/yii/id/1'))),
// 				array('text'=>CHtml::link('demo blog入口分析', array('/article/page/category/yii/id/2'))),
// 			),
// 		),
// 		array(
// 			'text'=>'<a href="#">MySQL</a>',
// 			'children'=>array(
// 				array('text'=>CHtml::link('MySQL权威指南笔记（一）', array('/article/page/category/mysql/id/1'))),
// 				array('text'=>CHtml::link('MySQL权威指南笔记（二）', array('/article/page/category/mysql/id/2'))),
// 			),
// 		),
// 	);
	private function makeList()
	{
		$ret = array();
		foreach ($this->_rawData as $article)
		{
			$nav = $article->nav;
			$navLabel = $nav->nav_name;
			$articleTitle = $article->title;
			if(!isset($ret[$navLabel]))
			{
				$ret[$navLabel]['text'] = "<a href='#'>{$navLabel}</a>";
			}
			$ret[$navLabel]['children'][] = array(
				'text' => CHtml::link($articleTitle, array('article/page', 'category'=>$navLabel, 'id'=>$article->id)),
				);
		}
		return array_values($ret);
	}
}