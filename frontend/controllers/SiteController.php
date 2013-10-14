<?php
class SiteController extends Controller
{
	public $layout='column1';
	
	public function init(){}
	
	public function actionIndex()
	{
		$this->render('index', array(
			
			));
	}
	
	public function actionError()
	{
		if(($error=Yii::app()->errorHandler->error) != FALSE)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
// 	public function actionTest()
// 	{
// 		echo json_encode(array('error_code'=>10000));
// 	}
}