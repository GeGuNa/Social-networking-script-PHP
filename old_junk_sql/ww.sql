alter table `user` add `hip` text default '';
alter table `user` add `hua` text default '';
alter table `user` add `hrul` text default '';
alter table `user` add `hlast` bigint(64) default null;
alter table `user` add `hbrowser` text default '';



alter table `user` MODIFY `hrul` int(32) default null;


alter table `notes` MODIFY `type` varchar(1256) default '';


alter table `notes` add `typef` varchar(1256) default '', add `image`  varchar(1256) default '';




alter table `poll` add `typef` varchar(1256) default '', add `image`  varchar(1256) default '';




alter table `poll_comments` add `typef` varchar(1256) default '';


alter table `gallery_komm` add `typef` varchar(1256) default '';


ALTER TABLE notes_like add `id` bigint(64) AUTO_INCREMENT;

ALTER TABLE `notes_like` ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT FIRST,ADD PRIMARY KEY (`id`);


ALTER TABLE `db`.`table` 
ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT FIRST,
CHANGE COLUMN `prev_column` `prev_column` VARCHAR(2000) NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`id`);
;










alter table `chat_posts` add `pfile` varchar(1256) default '';


