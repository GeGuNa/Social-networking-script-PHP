create table `user_sessions` (
`session_id` bigint(64) unsigned not null auto_increment,
`when` varchar(360) not null,
`hash` varchar(360) not null,
`user_id` bigint(64) unsigned not null,
`time_limit` bigint(64) unsigned not null,
`date_auth` bigint(64) unsigned not null,
PRIMARY KEY (`session_id`)
) AUTO_INCREMENT=1;





