<?php
/* @var $this NoteController */
/* @var $data Note */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo $data->note; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_time')); ?>:</b>
	<?php echo CHtml::encode(date("Y-m-d, H:i:s", $data->c_time)); ?>
	<br />


</div>