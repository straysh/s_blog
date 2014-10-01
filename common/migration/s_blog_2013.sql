/*20130927*/
create table if not exists `s_user`(
`id` int unsigned not null auto_increment primary key,
`name` varchar(16) not null,
`email` varchar(64) not null,
`password` char(32) not null,
`state` tinyint(1) unsigned not null default 1 comment '账户状态，1正常，2禁用',
`c_time` datetime,
`m_time` datetime,
index(name)
)engine=myisam default charset=utf8;

create table if not exists `s_article`(
`id` int unsigned not null auto_increment primary key,
`tid` char(13) not null comment '文章标签，对应s_tag的位模式标签xx.oo,xx表组，oo表值',
`title` varchar(128),
`author` varchar(64),
`hits` int unsigned,
`c_time` datetime,
`m_time` datetime
)engine=myisam default charset=utf8;

create table if not exists `s_article_content`(
`id` int unsigned not null auto_increment primary key,
`pid` int unsigned not null comment '文章ID',
`content` text,
`c_time` datetime,
`m_time` datetime
)engine=myisam default charset=utf8;

create table if not exists `s_tag`(
`id` int unsigned not null auto_increment primary key,
`gid` tinyint unsigned not null,
`position` tinyint unsigned not null,
`tagname` varchar(64),
`default` tinyint(1) unsigned default 1,
`c_time` datetime,
`m_time` datetime
)engine=myisam default charset=utf8;