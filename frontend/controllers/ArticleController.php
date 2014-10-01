<?php

class ArticleController extends FController
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

	public function actionCategory()
	{
		$category = Yii::app()->request->getParam('category');
		if(empty($category))
		{
			$this->render('//site/index');
		}
		/* @var Category $category */
		$category = Category::model()->findByName($category);
		$articles = Article::model()->findByCategory($category->id);
		$this->render('catlist', array(
				'articles' => $articles,
				'category' => $category,
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
