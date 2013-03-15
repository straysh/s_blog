<?php
$breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Create article', 'url'=>array('create')),
	array('label'=>'View article', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage article', 'url'=>array('admin')),
);
?>

<h1>Update article <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>