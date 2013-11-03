<?php
class UserController extends Controller
{
	public function actionOAuth()
	{
		if(isset($_GET['weibo']))
		{
			$action = !empty($_GET['weibo']) ? trim($_GET['weibo']) : NULL;
			if($action==='reg')
				$this->weiboReg();
			else if($action==='unreg')
				$this->weiboUnreg();
			else
				$this->weiboLogin();
		}else if(isset($_GET['qq']))
		{
			$action = !empty($_GET['qq']) ? trim($_GET['qq']) : NULL;
			if($action==='reg')
				$this->qqReg();
			else if($action==='unreg')
				$this->qqUnreg();
			else
				$this->qqLogin();
		}else if(isset($_GET['google']))
		{
			$action = !empty($_GET['google']) ? trim($_GET['google']) : NULL;
			if($action==='reg')
				$this->googleReg();
			else if($action==='unreg')
				$this->googleUnreg();
			else
				$this->googleLogin();
		}else if(isset($_GET['github']))
		{
			$action = !empty($_GET['github']) ? trim($_GET['github']) : NULL;
			if($action==='reg')
				$this->githubReg();
			else if($action==='unreg')
				$this->githubUnreg();
			else
				$this->githubLogin();
		}
	}
	
	private function weiboLogin()
	{
		$this->render('weiboLogin');
	}
	
	private function weiboReg()
	{
		$this->render('weiboLogin');
	}
	
	private function weiboUnreg()
	{
		var_dump('weibo unreg.');
	}
	
	private function qqLogin()
	{
		$this->render('qqLogin');
	}
	
	private function qqReg()
	{
		$this->render('qqLogin');
	}
	
	private function qqUnreg()
	{
		var_dump('qq unreg.');
	}
	
	private function googleLogin()
	{
		$this->render('googleLogin');
	}
	
	private function googleReg()
	{
		$this->render('googleLogin');
	}
	
	private function googleUnreg()
	{
		var_dump('google unreg.');
	}
	
	private function githubLogin()
	{
		$this->render('githubLogin');
	}
	
	private function githubReg()
	{
		$this->render('githubLogin');
	}
	
	private function githubUnreg()
	{
		var_dump('github unreg.');
	}
}