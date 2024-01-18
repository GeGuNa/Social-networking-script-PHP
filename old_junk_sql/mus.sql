create table `post_music_category` (
`cid` bigint(64) unsigned not null auto_increment,
`type` varchar(1024)  default '',
`name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`pimage` varchar(1024) default '',
`author` bigint(64) default '0',
PRIMARY KEY (`cid`)
) AUTO_INCREMENT=1;

create table `post_music` (
`uid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) default '0',
`whom` bigint(64) default '0',
`type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`producer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`cid`  bigint(64) default '0',
PRIMARY KEY (`uid`)
) AUTO_INCREMENT=1;


create table `post_music_likes` (
`lid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) default '0',
`whom` bigint(64) default '0',
`mid` bigint(64) default '0',
PRIMARY KEY (`lid`)
) AUTO_INCREMENT=1;


create table `post_music_bookmark` (
`bid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) default '0',
`whom` bigint(64) default '0',
`mid` bigint(64) default '0',
PRIMARY KEY (`bid`)
) AUTO_INCREMENT=1;


alter table `post_music_likes` add `mid` bigint(64) default '0';

alter table `post_music` add  `pimage` varchar(1024) default '';
alter table `post_music` add  `musLnk` varchar(1024) default '';
alter table `post_music` add  `likes` bigint(64) default '0';








create table `post_music_comments` (
`uid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) default '0',
`where` text default '',
`user` bigint(64) default '0',
`type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci default '',
`object_id`  bigint(64) default '0',
PRIMARY KEY (`uid`)
) AUTO_INCREMENT=1;



