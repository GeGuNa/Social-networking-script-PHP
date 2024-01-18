drop table `reporting`;
create table `reporting` (
`report_id` bigint(64) auto_increment,
`user` bigint(64) not null,
`whom` bigint(64) not null,
`when` bigint(64) not null,
`why` text default '',
`type` text default '',
`where` text default '',
`problem` text default '',
primary key(`report_id`)
);
	
