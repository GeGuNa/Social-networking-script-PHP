<?php


include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';

$qq = new Pagination();

if (!isset($user) || !isset($_GET['page'])) {
	exit;	
}


if (!ctype_digit($_GET['page']) || !is_numeric($_GET['page'])){
	exit;
}

$_GET['page'] = filter($_GET['page']);

if ($_GET['page'] == 0) {
	exit;	
}


$ardata = [];




$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `contacts` WHERE `user` = '".$user['id']."'");


//$ttlq = ($qq->calculation($kzftch322, $set['p_str'])+$set['p_str']);
$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$kzftch = $pdo->query("SELECT * from `contacts`  where  `user` = '".$user['id']."' ORDER BY `when` DESC LIMIT ".$ttlq.", ".$set['p_str']."");



while ($kdata = $kzftch->fetch()) { 

$psanzk1 = new user($kdata['whom']);
	
$kzfetch1 = $pdo->fetchOne("select * from messages  where  
 `user`  = '".$user['id']."' and `whom` = '".$psanzk1->id."' and `deleted_by` != '".$user['id']."' or 
 `whom`  = '".$user['id']."' and `user` = '".$psanzk1->id."' and `deleted_by` != '".$user['id']."'
 order by `when` desc limit 1");	
			
	
$hmntxtz41z_cnt = $pdo->queryFetchColumn("select count(*) from messages  where  `whom`  = '".$user['id']."' and `user` = '".$psanzk1->id."'  and `read` = '0'");		


if ($kzfetch1) {	
	$ardata[] = [
	'user' => $psanzk1->id,
	'nick' => $psanzk1->nick(),
	'when' => tmdt($kzfetch1['when']),
	'text' => utf_substr(Unescaped($kzfetch1['text']),0,30),
	'pic' => $psanzk1->photoRounded(48),
	'cnt' => $hmntxtz41z_cnt
	];
} else {
$ardata[] = [
	'user' => $psanzk1->id,
	'nick' => $psanzk1->nick(),
	'when' => '',
	'text' => '',
	'pic' => $psanzk1->photoRounded(48),
	'cnt' => $hmntxtz41z_cnt
	];
}
	
}

	



header("Content-type: text/json");


echo json_encode($ardata);


//header("Content-type: text/html");	

//echo json_encode(['text'=> text($text1_32_blg)]);
//echo text($text1_32_blg);


//}
