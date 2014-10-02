<?php
/* @var Articles $article */
/* @var Category $category */
$category = $article->category;
$this->renderPartial('//layouts/crumbs', array('category' => $category) );
$this->renderPartial('//layouts/summary', array('category' => $category) );
$this->renderPartial('_article', array('article' => $article) );