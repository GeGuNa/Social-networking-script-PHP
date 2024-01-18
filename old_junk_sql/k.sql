create table `user_activity` (
`uid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) default '0',
`where` text default '',
`user` bigint(64) default '0',
`type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`object_id`  bigint(64) default '0',
PRIMARY KEY (`uid`)
) AUTO_INCREMENT=1;



