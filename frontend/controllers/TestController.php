<?php
class TestController extends Controller
{
	public $layout='column1';
	
	public function init(){
		parent::init();
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionCaptchagoogle()
	{
		require_once(Yii::app()->params['captcha_google']['class']);
		$publickey = Yii::app()->params['captcha_google']['public_key'];
		echo recaptcha_get_html($publickey);
		exit;
	}
	
	public function actionThecaptcha()
	{
		require_once(Yii::app()->params['thecaptcha']['class']);
		captcha_show_image();
		exit;
	}
	
	public function action3dcaptcha()
	{
		require_once(Yii::app()->params['3dcaptcha']['class']);
		$captcha = new captcha3D('3D Text');
		$captcha->draw();
		exit;
	}
	
	public function action3dcaptcha2()
	{
		require_once(Yii::app()->params['3dcaptchav2']['pre_class']);
		require_once(Yii::app()->params['3dcaptchav2']['class']);
		exit;
	}
	
	public function actionQuickcaptcha()
	{
		require_once(Yii::app()->params['quickcaptcha']['class']);
		exit;
	}
}