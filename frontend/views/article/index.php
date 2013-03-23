<p>
1.Github提交中文乱码
这个状况是由于cygwin的中文乱码导致，解决办法：
vim ~/.inputrc 添加
</p>
<pre class="brush: bash">
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
set completion-ignore-case on
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
set completion-ignore-case on
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
set completion-ignore-case on
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
set completion-ignore-case on
set meta-flag on
set convert-meta off
set input-meta on
set output-meta on
set completion-ignore-case on
</pre>
<p>
重启console
2.Github公钥安装
确认已经安装了ssh，
在console输入ssh -v检查
没有ssh 需要启动setup.ext选择ssh安装即可。
a).#mkdir ~/.ssh
b).#ssh-keygen -t rsa (密码可以不设置，但是建议设置一下)
c).登录github网站，选择account settings（网站最上面）-&gt;SSH Keys(侧边栏)-&gt;Add SSH key,title任意，key需要vim ~/.ssh/id_rsa.pub复制出来
d).最后，git push 你的项目的ssh路径 例如：git push git@github:straysh/test.git
e).输入刚才设置密钥时设置的密码就ok了。
3.mintty中vim无彩色
a).检查.vimrc 中 syntax on
b).检查TERM变量，在console里输入
echo $TERM
如果输出的不是xterm，需要修改mintty的配置：
在控制台右键选options-&gt;termibal-&gt;type 选择xterm
并在console里输入 export TERM=xterm
4.vim中文乱码
最简单的办法 设置console字符集为utf8，打开vim之后set encoding=utf-8
或者修改.vimrc，添加
" 设置编码
set fenc=utf-8
set encoding=utf-8
set fileencodings=utf-8,gbk,cp936,latin-1
" 解决consle输出乱码
language messages zh_CN.utf-8
</p>