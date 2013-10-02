<?php
//article title
echo CHtml::tag('h1', array('class'=>'justcenter'), $model->title);
echo $model->content->content;