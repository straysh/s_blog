<?php
/* @var Article $article */
$parseDown = new Parsedown();
$content = $parseDown->text($article->atkl_content->content);
echo "<content><h1 class='justcenter'>{$article->title}</h1>{$content}</content>";