create table `active_users` (
`aid` bigint(64) auto_increment,
`user` bigint(64) default '0',
`type` varchar(64) default '',
`counter` bigint(64) default '0',
`when` bigint(64) default '0',
primary key(`aid`)
) auto_increment=1 engine=MyISAM;


alter table `active_users` add `counter` bigint(64) default '0';



create table `post_stickers` (
`sticker` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`type` varchar(1024) default '',
`user_id` bigint(64) unsigned not null,
`price` bigint(64) unsigned not null,
`by_whom` bigint(64) unsigned not null,
PRIMARY KEY (`sticker`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



create table `post_sticker` (
`sticker` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`type` varchar(1024) default '',
`user_id` bigint(64) unsigned not null,
`by_whom` bigint(64) unsigned not null,
`active_to` bigint(64) unsigned not null,
`sticker_id` varchar(64) default '',
PRIMARY KEY (`sticker`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



