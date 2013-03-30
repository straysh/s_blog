<?php 
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shCore.css');
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shThemeRDark.css');
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shCore.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushConf.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushBash.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushPhp.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScript('syntax_01', "SyntaxHighlighter.defaults['toolbar'] = false;	SyntaxHighlighter.all();", CClientScript::POS_READY);
?>
<h1 class="justcenter">居中测试</h1>
<h2 id="toc_0.1">Github提交中文乱码</h2>
<p>这个状况是由于cygwin的中文乱码导致，解决办法：vim ~/.inputrc 添加
</p>
<pre class="brush:conf">
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
</pre>
重启console
<h2 id="toc_0.2">Github公钥安装</h2>
<p>确认已经安装了ssh，
在console输入ssh -v检查<br />
没有ssh 需要启动setup.ext选择ssh安装即可。<br />
a).#mkdir ~/.ssh<br />
b).#ssh-keygen -t rsa (密码可以不设置，但是建议设置一下)<br />
c).登录github网站，选择account settings（网站最上面）-&gt;SSH Keys(侧边栏)-&gt;Add SSH key,title任意，key需要vim ~/.ssh/id_rsa.pub复制出来<br />
d).最后，git push 你的项目的ssh路径 例如：git push git@github:straysh/test.git<br />
e).输入刚才设置密钥时设置的密码就ok了。
<h2 id="toc_0.3">mintty中vim无彩色</h2>
a).检查.vimrc 中 syntax on<br />
b).检查TERM变量，在console里输入<br />
echo $TERM<br />
如果输出的不是xterm，需要修改mintty的配置：<br />
在控制台右键选options-&gt;termibal-&gt;type 选择xterm<br />
并在console里输入 export TERM=xterm
<h2 id="toc_0.4">vim中文乱码</h2>
最简单的办法 设置console字符集为utf8，打开vim之后set encoding=utf-8<br />
或者修改.vimrc，添加<br />
</p>
<pre class="brush:conf">
" 设置编码
set fenc=utf-8
set encoding=utf-8
set fileencodings=utf-8,gbk,cp936,latin-1
" 解决consle输出乱码
language messages zh_CN.utf-8 
</pre>
<h2 id="toc_0.5">warning: CRLF will be replaced by LF</h2>
#git config --global core.autocrlf false<br />
<h2 id="toc_0.6">禁止Vimwiki自动套用p标签</h2>
vimwiki会自动套用p标签，当我们使用自定义的html标签时，页面就会变形。我将段落改为=tab激活(段落以一个=号和tab键开头)，找到autoload/vimwiki_html.vim文件，修改L856-L871：<br />
有点hack的味道，不过暂时解决了这个难题
<pre class="brush:bash">
function! s:process_tag_para(line, para) "{{{
  let lines = []
  let para = a:para
  let processed = 0
  if a:line =~ '^=\t\S'
    if !para
"     call add(lines, "<p>")
      let para = 1
    endif
    let processed = 1
    call add(lines, substitute(a:line,'^=\t', '< p>',''))
  elseif para &amp;&amp; a:line =~ '^\s*$'
    call add(lines, "</p>")
    let para = 0
  endif
  return [processed, lines, para]
endfunction "}}}
</pre>