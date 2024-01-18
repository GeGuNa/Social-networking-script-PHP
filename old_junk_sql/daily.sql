

drop table gossip_daily_topics,gossip_daily_topics_comments,gossip_daily_topics_like;

create table `gossip_daily_topics` (
`tid` bigint(64) auto_increment,
`user` bigint(64) not null,
`when` bigint(64) not null,
`text` text default '',
`pfile` text default '',
`like` bigint(64) not null,
`status` set('open','close') default 'open',
primary key(`tid`)
);


create table gossip_daily_topics_comments (
`pid` bigint(64) auto_increment,
`user` bigint(64) not null,
`when` bigint(64) not null,
`where` bigint(64) not null,
`like` bigint(64) not null,
`pfile` text default '',
primary key(`pid`)
);



create table gossip_daily_topics_like (
`lid` bigint(64) auto_increment,
`user` bigint(64) not null,
`when` bigint(64) not null,
`like` varchar(1228) default '',
primary key(`lid`)
);

