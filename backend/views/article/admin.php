<h1>Manage Articles</h1>

<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
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
			'value' => 'Category::model()->navName($data->nav_id, false)',
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
		),
	),
)); ?>
