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
		/* @var Category $category */
		$category = Category::model()->findByName($category);
		if(empty($category))
		{
			$this->render('//site/index');
		}
		$articles = Article::model()->findByCategory($category->id);
		$this->render('catlist', array(
				'articles' => $articles,
				'category' => $category,
			));
	}
	
	public function actionPage()
	{
		$id = Yii::app()->request->getParam('id');
		$article = Article::model()->findByPk($id);
		if(empty($article))
		{
			$this->render('//site/index');
		}
		$this->render('page', array(
			'article' => $article,
			));
	}
}
