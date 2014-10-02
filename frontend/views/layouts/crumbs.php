<?php
/* @var Category $category */
$categoryUrl = $this->createUrl("/article/{$category->nav_name}");
$crumbs = <<<HTML
__Straysh的个人博客__ » [首页][1] » [{$category->nav_name}][2]

[1]:http://www.straysh.com "Straysh的个人博客"
[2]:{$categoryUrl} "{$category->nav_name}"

<form action="/search" class="header-search pull-left hidden-sm hidden-xs" onclick="alert('not implemented yet!');">
    <button type="submit" class="btn btn-link"><span class="sr-only">搜索</span><span class="glyphicon glyphicon-search"></span></button>
    <input id="searchBox" name="q" type="text" placeholder="输入关键字搜索" class="form-control" value="" style="width: 180px;">
</form>
HTML;

$parseDown = new Parsedown();
$crumbs = $parseDown->text($crumbs);
echo "<crumbs><h4>{$crumbs}</h4></crumbs>";