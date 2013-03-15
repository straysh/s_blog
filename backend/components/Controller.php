<?php
class Controller extends CController
{
	public function init()
	{
		$this->onNotLogin();
	}
	
	/**
	 * 未登录用户逻辑
	 */
	private function onNotLogin() {
		if(Yii::app()->user->isGuest === true &&
				strtolower(Yii::app()->UrlManager->parseUrl(Yii::app()->request)) != 'site/login')
		{
			// 直接跳转到登陆页
			$this->redirect($this->createUrl("site/login"));
			Yii::app()->end();
		}
	}
}