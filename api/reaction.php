<?php

include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';


//$user['id']  = 2;

if (!isset($user) || !isset($_GET['post']) || !isset($_GET['type']) || !isset($_GET['where'])) {
	exit;	
}


if (!ctype_digit($_GET['post']) || !is_numeric($_GET['post'])){
	exit;
}

$idpst = filter($_GET['post']);

if ($_GET['post'] == 0) {
	exit;	
}


if (!in_array($_GET['type'], array('wow','sad','angry','frown','love'))) {
	exit;
}

if (!in_array($_GET['where'], array('chat','chatting','day_topics','blogs','foto','video','votes'))) {
	exit;
}

$where = my_esc($_GET['where']);

//$kq_zz = $kqrct->wow + $kqrct->sad + $kqrct->angry + $kqrct->frown + $kqrct->love;


if ($where == 'chat')
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `chat_posts` WHERE `id` = ?", [$idpst]);
else if ($where == 'video')
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `video_komm` WHERE `id` = ?", [$idpst]);	
else if ($where == 'blogs')
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `notes_komm` WHERE `id` = ?", [$idpst]);
else if ($where == 'chatting') 
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `chatting` WHERE `id` = ?", [$idpst]);
else if ($where == 'foto') 
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `gallery_komm` WHERE `id` = ?", [$idpst]);	
else if ($where == 'day_topics') 
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `gossip_daily_topics_comments` WHERE `pid` = ?", [$idpst]);
else if ($where == 'votes')
	$kzftch322 = $pdo->fetchOne("SELECT * FROM `poll_comments` WHERE `id` = ?", [$idpst]);



$qkqweqw = json_decode($kzftch322['reactions']);	

$k1 = '{"wow":'.$qkqweqw->wow.',"sad":'.$qkqweqw->sad.',"angry":'.$qkqweqw->angry.',"frown":'.$qkqweqw->frown.',"love":'.$qkqweqw->love.'}';
	
	
if ($where == 'day_topics') {
	$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE `post_id` = '".$kzftch322['pid']."' and `where` = ? and `user` = '".$user['id']."'", [$where]);
} else {
	$kzftch3222 = $pdo->fetchOne("SELECT * FROM `user_post_reaction` WHERE `post_id` = '".$kzftch322['id']."' and `where` = ? and `user` = '".$user['id']."'", [$where]);
}




//var_dump($kzftch3222);

$gqweq = my_esc($_GET['type']);	

$sj1_2 = json_decode($k1, true);


if (!$kzftch3222) {
	
	
$sj1_2[$gqweq] = $sj1_2[$gqweq]+1;

$nwvw1 = json_encode($sj1_2);	
	
//$kqChange = str_replace('"'.$gqweq.'":'.$qkqweqw->$gqweq.'', '', $k1); 	
	

if ($where == 'day_topics') {
	
	$pdo->query("insert into `user_post_reaction`(`when`,`where`,`user`,`type`,`post_id`) values(?, ?,?,?, ?)", [$time, $where, $user['id'], $gqweq, $kzftch322['pid']]);	
	
} else {
	
	$pdo->query("insert into `user_post_reaction`(`when`,`where`,`user`,`type`,`post_id`) values(?, ?, ?, ?, ?)", [$time, $where, $user['id'], $gqweq, $kzftch322['id']]);
		
}	
	
	
	
/*	
	
	
	if ($where == 'chat')
	$kzftch322 = mysql_fetch_array(mysql_query("SELECT * FROM `chat_posts` WHERE `id` = '".$idpst."' "));
else if ($where == 'chatting') 
	$kzftch322 = mysql_fetch_array(mysql_query("SELECT * FROM `chatting` WHERE `id` = '".$idpst."' "));
else if ($where == 'day_topics') 
	

*/

if ($where == 'chat')
	$pdo->query("update `chat_posts` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'blogs') 
	$pdo->query("update `notes_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'foto') 
	$pdo->query("update `gallery_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);	
else if ($where == 'chatting') 
	$pdo->query("update `chatting` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'day_topics') 
	$pdo->query("update `gossip_daily_topics_comments` set `reactions` = ? where `pid` = ?",[$nwvw1, $kzftch322['pid']]);
else if ($where == 'video')
	$pdo->query("update `video_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);		
else if ($where == 'votes')
	$pdo->query("update `poll_comments` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
	
	

} else {



if ($kzftch3222['type'] == $gqweq) {
	
if ($where != 'day_topics')  {

$pdo->query("delete from `user_post_reaction` where 
	`post_id` = '".$kzftch322['id']."' and 
	`where` = ? and 
	`user` = '".$user['id']."'",[$where]);
	
} else {
	
	$pdo->query("delete from `user_post_reaction` where 
	`post_id` = '".$kzftch322['pid']."' and 
	`where` = ? and 
	`user` = '".$user['id']."'",[$where]);
	
}
	
	
	
	
$sj1_2[$gqweq] = $sj1_2[$gqweq]-1;

$nwvw1 = json_encode($sj1_2);	



if ($where == 'chat')
	$pdo->query("update `chat_posts`  set  `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'blogs') 
	$pdo->query("update `notes_komm`  set  `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);	
else if ($where == 'foto') 
	$pdo->query("update `gallery_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);	
else if ($where == 'chatting') 
	$pdo->query("update `chatting`  set  `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'day_topics') 
	$pdo->query("update `gossip_daily_topics_comments`  set  `reactions` = ? where `pid` = ?",[$nwvw1, $kzftch322['pid']]);
else if ($where == 'video')
	$pdo->query("update `video_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);				
else if ($where == 'votes')
	$pdo->query("update `poll_comments` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);


	
	
} else {
	

$sj1_2[$gqweq] = $sj1_2[$gqweq]+1;


if ($sj1_2[$kzftch3222['type']] != 0) {
	$sj1_2[$kzftch3222['type']] = $sj1_2[$kzftch3222['type']]-1;
}

$nwvw1 = json_encode($sj1_2);	

//mysql_query("insert into `user_post_reaction`(`when`,`where`,`user`,`type`,`post_id`) values($time, 'chat','$user[id]','$gqweq', '$kzftch322[id]')");


if ($where != 'day_topics')  {

	$pdo->query("update `user_post_reaction` set `type` = ? where  `post_id` = ? and `user` = ? and `where` = ?", [$gqweq, $kzftch322['id'], $user['id'], $where]);

} else {
	
	$pdo->query("update `user_post_reaction` set `type` = ? where  `post_id` = ? and `user` = ? and `where` = ?", [$gqweq, $kzftch322['pid'], $user['id'], $where]);	
		
	
}



if ($where == 'chat')
	$pdo->query("update `chat_posts` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'blogs') 
	$pdo->query("update `notes_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'chatting') 
	$pdo->query("update `chatting` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'foto') 
	$pdo->query("update `gallery_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);
else if ($where == 'day_topics') 
	$pdo->query("update `gossip_daily_topics_comments` set `reactions` = ? where `pid` = ?",[$nwvw1, $kzftch322['pid']]);
else if ($where == 'video')
	$pdo->query("update `video_komm` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);		
else if ($where == 'votes')
	$pdo->query("update `poll_comments` set `reactions` = ? where `id` = ?",[$nwvw1, $kzftch322['id']]);		
		
	
		

}
	
	
	
}




header("Content-type: text/json");



