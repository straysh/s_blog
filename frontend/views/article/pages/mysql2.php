<?php 
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shCore.css');
Yii::app()->getClientScript()->registerCssFile('/css/highlight/shThemeRDark.css');
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shCore.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushConf.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScriptFile('/js/highlight/shBrushSql.js', CClientScript::POS_HEAD);
Yii::app()->getClientScript()->registerScript('syntax_01', "SyntaxHighlighter.defaults['toolbar'] = false;	SyntaxHighlighter.all();", CClientScript::POS_READY);
?>
<p>接着刚才的话题。FROM子句中的表引用table reference是可以用表表达式table expression来替换的(这两者本身也是等价的)
<pre class='brush:sql'>
SELECT * FROM `stu` WHERE `name`='Jack'
等价于：SELECT * FROM (SELECT *　FROM `stu`) tmp WHERE `name`='Jack'//注意别名的使用
上面用法是毫无意义的,只是为说明语法，看下面的例子：
SELECT tmp.`name`,`course_name`
FROM (SELECT * FROM `stu` WHERE `age`&gt;30) tmp,`course` c
WHERE tmp.`id`=c.`sid`
</pre>
<h3 id="toc_0.0.1">SELECT语句：WHERE子句</h3>
<p>FROM子句结束后，执行的就是WHERE子句。WHERE子句过滤出了符合条件的临时表中的行。说的更仔细：WHERE子句过滤掉（删除）了谓词为false或者unknown的行。
<p>假设stu表中有一行记录 12 Yoyo (NULL) 即id字段为数值12，name字段为字符'Yoyo'，age字段为NULL。NULL值在MySQL中就是不可测定的，不可知的。因此在执行WHERE age&gt;30 的测试时，返回的是unknown，既不是true也不是false。
<p>WHERE子句可以包含一下条件：
<ol>
<li>
<a href='#comparison-operator'>比较运算符</a>
</li>
<li>
<a href='#logical-operator'>AND、OR、XOR、NOT</a>
</li>
<li>
<a href='#in-operator'>带有列表的IN</a>
</li>
<li>
BETWEEN
</li>
<li>
LIKE
</li>
<li>
REGEXP
</li>
<li>
<a href='#match-operator'>MATCH</a>
</li>
<li>
<a href='#null-operator'>NULL</a>
</li>
<li>
<a href='#anyall-operator'>ANY、ALL</a>
</li>
<li>
<a href='#exists-operator'>EXISTS</a>
</li>
</ol>
<a name='comparison-operator'></a>
<p>比较运算符包括：=等于、&lt;小于、&gt;大于、&lt;=小于等于、&gt;=大于等于、&lt;&gt;不等于，以及不常用的!=不等于、&lt;=&gt;相等或者都等于空。对于带有列表的比较运算符：例如(x,y)=(1,3)，MySQL在内部将其转化为 (x=1) AND (y=3);(x,y)&gt;(1,3),内部转化为(x&gt;1) OR (x=1 AND y&gt;3)。MySQL在内部的转换和我们自然的认为(x&gt;1) AND (y&gt;3)是不同的！！。鉴于这种列表式的写法最终还是会被MySQL转换为常规的AND、OR，建议直接使用这种常规的写法，也不容易出现错误。
<p>有一种比较特殊的关联子查询(correlated subquery)，看例子：
<pre class='brush:sql'>
SELECT c.course_name
FROM course c
WHERE 30 &lt; (SELECT s.age FROM stu s WHERE s.id=c.sid)
</pre>
<p>关联子查询的特点是，子查询的结果依赖主表的行。例如上例中的SELECT s.age FROM stu s WHERE s.id=c.sid，年龄的查询依赖于主表的sid，即主表没扫描一行，子查询就要重新计算一次。
<a name='logical-operator'></a>
<p>逻辑AND、OR、XOR、NOT就不需要多说了。
<a name='in-operator'></a>
<p>IN操作符后面需要跟一个列表，一个使用（）圆括号包起来的以,逗号分隔的值
<a name='match-operator'></a>
<p>MATCH用在全文检索，不讨论。
<a name='null-operator'></a>
<p>前面说过，NULL在MySQL中是不可测定的，未知的值。所以诸如WHERE col=NULL这样的语法是错误的。而应该写作：WHERE col IS NULL、WHERE col IS NOT NULL
<a name='anyall-operator'></a>
<p>ALL、ANY、SOME通常用在比较运算符有操作数为列表的情形。其中SOME和ANY是同义词。看下面的例子：
<pre class='brush:sql'>
SELECT s.id,s.name FROM stu s WHERE s.id &gt; ALL (1,2,3)//条件为s.id大于(1,2,3)中的每一个值
SELECT s.id,s.name FROM stu s WHERE s.id &gt; ANY (1,2,3)//条件为s.id大于(1,2,3)中的任意一个值
SELECT s.id,s.name FROM stu s WHERE s.id &gt; ALL (SELECT c.sid FROM course c WHERE c.course_name='Math')
//条件为s.id大于子查询中的每一个值
</pre>
<a name='exists-operator'></a>
<p>EXISTS通常用在关联子查询中。用来作为测试条件。我们改造一下之前correlated subquery的例子：
<pre class='brush:sql'>
SELECT c.course_name
FROM course c
WHERE EXISTS (SELECT * FROM stu s WHERE s.id=c.sid AND s.age&gt;30)
</pre>
<p>最终的结果是一样的。当WHERE测试为true时，主表的select就会返回相应的结果。