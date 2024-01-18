
drop table poll_like;


create table poll_like (
`id` bigint(64) auto_increment,
`user` bigint(64) not null,
`when` varchar(64) default '',
`poll` bigint(64) not null,
`like` bigint(64) not null,
primary key(`id`)
);
