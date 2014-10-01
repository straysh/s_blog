<?php
/* @var Category $category */
$categories = $this->createUrl('/');
$summary = <<<HTML
<summary><a href="{$categories}">分类</a>: {$category->nav_name} ( 共{$category->total}篇文章 )</summary>
HTML;

echo $summary;