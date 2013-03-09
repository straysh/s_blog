<?php
class SiteController extends Controller
{
	public function init(){}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}