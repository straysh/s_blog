<?php
class SiteController extends BController
{
	public $layout='column1';
	
	public function actionIndex()
	{
		if (!Yii::app()->user->getIsGuest())
		{
			$this->layout='//layouts/column2';
		}
		$this->render('index');
	}

	/**
	 * 用户登录 
	 */
	public function actionLogin()
	{
		$model=new LoginForm('login');

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				$msg = '未知错误！';
				$errorCode = $model->getError(LoginForm::$LOGIN_ERROR);
				switch ($errorCode) {
				case UserIdentity::ERROR_LOGIN_FAILD:
				    $msg = "登录失败！";
				    break;
				case UserIdentity::ERROR_PASSWORD_INVALID:
				    $msg = "密码错误！";
				    break;
				case UserIdentity::ERROR_USERNAME_INVALID:
				    $msg = "用户名错误！";
				    break;
				}
				$model->clearErrors();
				$model->addError(LoginForm::$LOGIN_ERROR, $msg);
			}
		}
		
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/encode.min.js');
		$this->render('login',array('model'=>$model));	
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * 注册新用户 
	 */
	public function actionReg()
	{
		
		$model=new LoginForm('reg');

		if(isset($_POST['ajax']) && $_POST['ajax']==='susr-reg-reg_form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->reg())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/encode.min.js');
		$this->render('reg_form',array('model'=>$model));	
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