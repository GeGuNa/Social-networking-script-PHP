	
create table notes_like (
`id` bigint(64) auto_increment,
`id_user` bigint(64) not null,
`when` varchar(64) default '',
`id_notes` bigint(64) not null,
`like` bigint(64) not null,
primary key(`id`)
);
	
