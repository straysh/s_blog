<?php
class ArticleController extends Controller
{
	//AAAAAAAAAAAAAAAAAAAAAAAAAAAFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFXXXXXXXXXXXXXXXXXXXXXXXOOOOOOOOOOOOOOOOOOOOOOODDDDDDDDDDDDDDDDDDDDDDDDDD
	public $layout='column1';
	
	public function init(){}
	
	public function filters()
	{
		$bool = True && true && TRUE;
		return array(
			array(
				'COutputCache',
				'duration'=>86400,
				'varyByParam'=>array('category', 'id'),
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
