<?php
class NoteController extends FController
{
	public $layout='column1';
	
	public function actionIndex()
	{
		$model = new Note;
		$data = $model->findAll(array(
			'condition' => 'c_time >= :time',
			'params' => array(':time'=>time()-7*86400),
			'order' => 'id DESC',
		));
		$this->render('index',array(
			'data'=>$data,
		));
	}
}