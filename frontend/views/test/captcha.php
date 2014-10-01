<?php echo CHtml::link('recaptcha(google)', array('test/captchagoogle')) ?>
<?php 
require_once(Yii::app()->params['captcha_google']['class']);
$publickey = Yii::app()->params['captcha_google']['public_key'];
echo recaptcha_get_html($publickey);
?>
<hr />
<?php echo CHtml::link('thecaptcha', array('test/thecaptcha')) ?>
	<br />
<?php echo CHtml::image(Yii::app()->createUrl('test/thecaptcha')) ?>
<hr />
<?php echo CHtml::link('3dcaptcha', array('test/3dcaptcha')) ?>
	<br />
<?php echo CHtml::image(Yii::app()->createUrl('test/3dcaptcha')) ?>
<hr />
<?php echo CHtml::link('3dcaptcha2', array('test/3dcaptcha2')) ?>
	<br />
<?php //echo CHtml::image(Yii::app()->createUrl('test/3dcaptcha2')) ?>
<hr />
<?php echo CHtml::link('quickcaptcha', array('test/quickcaptcha')) ?>
	<br />
<?php echo CHtml::image(Yii::app()->createUrl('test/quickcaptcha')) ?>