<?php
/* @var $this NoteController */
/* @var $model Note */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('note-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Notes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'note-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'type' => 'raw',
			'name' => 'note',
			'value' => '$data->note',
		),
		array(
			'header'=> 'c_time',
			'value' => 'date("Y-m-d, H:i:s", $data->c_time)',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
