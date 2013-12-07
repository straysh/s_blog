<h1>View Note #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'note',
		array(
			'name' => 'c_time',
			'value' => date("Y-m-d, H:i:s", $model->c_time),
		),
	),
)); ?>
