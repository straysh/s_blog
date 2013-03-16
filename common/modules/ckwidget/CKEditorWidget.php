<?php
class CKEditorWidget extends CInputWidget
{
	public $ckFinder;
	public $ckEditor;
	public $ckBasePath;
	public $defaultValue;
	public $config;

	public function run()
	{
		if(!isset($this->model)){
			throw new CHttpException(500,'"model" have to be set!');
		}
		if(!isset($this->attribute)){
			throw new CHttpException(500,'"attribute" have to be set!');
		}
		if(!isset($this->ckEditor)){
			$this->ckEditor = "/ckeditor/ckeditor.php";
		}
		if(!isset($this->ckBasePath)){
			$this->ckBasePath = "/ckeditor/";
		}
		if(!isset($this->defaultValue)){
			$this->defaultValue = "";
		}
		if(!isset($this->ckFinder)){
			$this->ckFinder = '/ckfinder/ckfinder.php';
		}

		$controller=$this->controller;
		$action=$controller->action;
		$this->render('CKEditorView',array(
			"ckBasePath"=>$this->ckBasePath,
			"ckEditor"=>$this->ckEditor,
			"ckFinder"=>$this->ckFinder,
			"model"=>$this->model,
			"attribute"=>$this->attribute,
			"defaultValue"=>$this->defaultValue,
			"config"=>$this->config,
		));
	}
}
?>