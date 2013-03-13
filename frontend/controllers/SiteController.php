<?php
class SiteController extends Controller
{
	public $layout='column1';
	
	public function init(){}
	
	public function actionIndex()
	{
		$this->render('index', array(
			'model'=>new TestModel,
			));
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}