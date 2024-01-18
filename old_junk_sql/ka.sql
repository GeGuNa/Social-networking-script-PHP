

create table `user_stickers` (
`id` bigint(64) auto_increment,
`who` bigint(64) default '0',
`user` bigint(64) default '0',
`sticker_id` bigint(64) default '0',
`time` bigint(64) default '0',
`when` bigint(64) default '0',
`type` text default '',
primary key(`id`)
) auto_increment = 1;
