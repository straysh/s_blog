<?php
$content = <<<HTML
> yummy的javascript重构，开始施行编码规范。本规范适用于全站yummy部分的编码。
> 对第三方库的修改，可自行斟酌使用合适的规范。

1. 缩进时使用4个空格替代tab。
2. 使用驼峰式命名时，从第二个单词开始每个单词首字母大写，其余全部小写；使用连字符时，所有字符均小写。
3. &nbsp;<notice>选择器名</notice>使用驼峰式命名或者使用短横线<note>-</note>连接。class选择器使用'-js'结尾，
例如：
```html
<div id="alertDialog" class="alertDialog-js">选择器命名规范</div>
或者
<div id="alert-dialog" class="alert-dialog-js">选择器命名规范</div>
```
4. &nbsp;<notice>变量名</notice>使用驼峰式命名或者使用下划线<note>_</note>连接。
例如
```js
var foo = activateSubmit;
或者
var foo = activate_submit;
```
5. 禁止使用<notice>全局变量</notice>。如果需要使用，必须使用window.Yooxx='ooxx'的格式
例如：
```js
function foo(){
    window.Yflag = false;
	...//函数主体
}
```
6. 定义<notice>模块</notice>时，使用驼峰式并且__首字母要大写__。
HTML;


$parseDown = new Parsedown();
$content = $parseDown->text($content);

echo "<content>$content</content>";