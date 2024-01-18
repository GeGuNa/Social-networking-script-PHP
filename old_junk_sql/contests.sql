create table `contests` (
`cid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`end` bigint(64) unsigned not null,
`cover` varchar(64) default '',
`name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`user_id` bigint(64) unsigned not null,
`keycode` bigint(64) unsigned not null,
`views` bigint(64) default '0',
`likes` bigint(64) default '0',
`howmanypeople` bigint(64) unsigned not null,
`thewinner` bigint(64) unsigned not null,
`prize` bigint(64) default '0',
`contest_status` set('open','closed','pending') default 'pending',
PRIMARY KEY (`cid`)
) AUTO_INCREMENT=1;



create table `contest_participants` (
`pid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`cover` varchar(64) default '',
`user_id` bigint(64) unsigned not null,
`object_id` bigint(64) unsigned not null,
`likes` bigint(64) default '0',
`views` bigint(64) default '0',
PRIMARY KEY (`pid`)
) AUTO_INCREMENT=1;



create table `contest_participant_photos` (
`pid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`photo` varchar(1024) default '',
`user_id` bigint(64) unsigned not null,
`object_id` bigint(64) unsigned not null,
PRIMARY KEY (`pid`)
) AUTO_INCREMENT=1;



create table `contest_participant_photo_likes` (
`lid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`photo` bigint(64) unsigned not null,
`user_id` bigint(64) unsigned not null,
`object_id` bigint(64) unsigned not null,
PRIMARY KEY (`lid`)
) AUTO_INCREMENT=1;





