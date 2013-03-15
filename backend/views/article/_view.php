<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::encode($data->uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_id')); ?>:</b>
	<?php echo CHtml::encode($data->class_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comesfrom')); ?>:</b>
	<?php echo CHtml::encode($data->comesfrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('key_words')); ?>:</b>
	<?php echo CHtml::encode($data->key_words); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hits')); ?>:</b>
	<?php echo CHtml::encode($data->hits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_time')); ?>:</b>
	<?php echo CHtml::encode($data->m_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_time')); ?>:</b>
	<?php echo CHtml::encode($data->c_time); ?>
	<br />

	*/ ?>

</div>