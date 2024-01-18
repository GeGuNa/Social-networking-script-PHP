
create table `Password_sessions` (
`pid` bigint(64) unsigned not null auto_increment,
`when` bigint(64) unsigned not null,
`sees` varchar(64) default '',
`user_id` bigint(64) unsigned not null,
`keycode` bigint(64) unsigned not null,
PRIMARY KEY (`pid`)
) AUTO_INCREMENT=1;




mysql_query("insert into `Password_sessions`(`when`,`sees`,`user_id`,`keycode`) values()");
