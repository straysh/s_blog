<?php
/* @var Articles $articles */
/* @var Category $category */
$this->renderPartial('//layouts/crumbs', array('category' => $category) );
$this->renderPartial('//layouts/summary', array('category' => $category) );
$this->renderPartial('_category', array('articles' => $articles) );