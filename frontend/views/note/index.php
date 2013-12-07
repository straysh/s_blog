<style>
.note{padding-left:10px;}
.note+.note{margin-top:10px;border-top:2px dashed #CCC;border-left:2px solid #CCC;border-radius:10px;}
</style>
<h1>Notes</h1>

<?php 
echo "<ol>";
foreach ($data as $item)
{
	echo "<li class='note'>{$item->note}</li>";
}
echo "</ol>";