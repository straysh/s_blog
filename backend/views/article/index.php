<?php
$breadcrumbs=array(
	'Articles',
);

$menu=array(
	array('label'=>'Create article', 'url'=>array('create')),
	array('label'=>'Manage article', 'url'=>array('admin')),
);
?>

<h1>Articles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
