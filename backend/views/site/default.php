<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<frameset rows="92,*" cols="*" frameborder="no" border="0"
	framespacing="0">
	<frame
		src="<?php
		echo Yii::app()->createUrl("site/head");
		?>"
		name="topFrame" scrolling="no" noresize="noresize" id="topFrame" />
	<frameset cols="215,*" frameborder="no" border="0" framespacing="0">
		<frame
			src="<?php
			echo Yii::app()->request->baseUrl;
			?>/index.php/site/left"
			scrolling="no" noresize="noresize" id="leftFrame" />
		<frame src="" name="mainFrame" id="mainFrame" />
	</frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>