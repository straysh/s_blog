<?php
$breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Create article', 'url'=>array('create')),
	array('label'=>'Update article', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete article', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage article', 'url'=>array('admin')),
);
?>

<h1>View article #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'uid',
		'class_id',
		'title',
		'content',
		'comesfrom',
		'key_words',
		'hits',
		'm_time',
		'c_time',
	),
)); ?>
