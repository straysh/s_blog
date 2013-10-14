<?php
class ArticleController extends Controller
{
	public $layout='column1';
	
	public function init(){}
	
	public function filters()
	{
		return array(
			array(
				'COutputCache + page',
				'duration' => -1,
				'varyByParam' => array('category', 'id'),
				),
			);
	}
	
	public function actions()
	{
// 		return array(
// 			'page'=>array(
// 				'class'=>'ArticleRoute',
// 				'viewParam'=>'id',
// 				),
// 			);
	}
	
	public function actionIndex()
	{
		$this->render('index', array(
			
			));
	}
	
	public function actionPage()
	{
		$category = Yii::app()->request->getParam('category');
		$id = Yii::app()->request->getParam('id');
		$model = Article::model()->findByPk($id);
		$this->render('page', array(
			'model' => $model,
			));
	}
}
