<?php
class ArticleController extends Controller
{
	public $layout='column1';
	
	public function init(){}
	
	public function filters()
	{
		return array(
			array(
				'COutputCache',
				'duration'=>10,
				'varyByParam'=>array('id'),
				),
			);
	}
	
	public function actions()
	{
		return array(
			'page'=>array(
				'class'=>'ArticleRoute',
				'viewParam'=>'id',
				),
			);
	}
	
	public function actionIndex()
	{
		$this->render('index', array(
			
			));
	}
}
