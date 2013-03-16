<?php
$breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$menu=array(
	array('label'=>'List article', 'url'=>array('index')),
	array('label'=>'Manage article', 'url'=>array('admin')),
);
?>

<h1>Create article</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>