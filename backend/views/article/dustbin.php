<h1>Manage Articles</h1>

<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->dustbin(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'type' => 'raw',
			'value' => 'Chtml::link($data->id, array("view", "id"=>$data->id))',
			'htmlOptions' => array('width'=>'2%')
		),
		array(
			'name' => 'nav_id',
			'type' => 'raw',
			'value' => 'Chtml::link(Category::model()->navName($data->nav_id, false), array("article/admin", "Article[nav_id]"=>"$data->nav_id"))',
			'htmlOptions' => array('width'=>'5%')
		),
		array(
			'name' => 'title',
			'type' => 'raw',
			'value' => 'Chtml::link($data->title, MyRequest::preview($data->id), array("target"=>"_blank"))',
			'htmlOptions' => array('width'=>'30%')
		),
		'author',
		'tid',
		'hits',
		'm_time:date',
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
			'deleteButtonLabel' => 'Restore',
			'deleteButtonImageUrl' => '/images/restore.jpg',
			'deleteButtonUrl' => 'Yii::app()->controller->createUrl("restore",array("id"=>$data->primaryKey))',
			'deleteConfirmation' => 'Are you sure you want to restore this item?'
		),
	),
)); ?>
