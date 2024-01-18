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



if (!isset($_GET['who'])) {
	header("Location: /index.php");
	exit;
}
	
if (!is_numeric($_GET['who'])) {
	header("Location: /index.php");
	exit;
}	


$bwho = filter($_GET['who']);


$ank = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?", [$bwho]);



if (!$ank) {
	header("Location: /index.php");
	exit;
}


$qz1 = new user($ank['id']);



$ardata = [];



///////////////////


$kz_mfhmn1_213 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM	`messages`  where  ((`user`  = '".$user['id']."' and `whom` = '".$qz1->id."' or `whom`  = '".$user['id']."' and `user` = '".$qz1->id."') and `deleted_by` != '".$user['id']."')");

$ttlqzw21 = $qq->calculation($kz_mfhmn1_213, $set['p_str']);
//echo $ttlqzw21."<br/>";

$kzftch = $pdo->query("select * from messages  where  
(

(`user`  = '".$user['id']."' and `whom` = '".$qz1->id."'  or  `whom`  = '".$user['id']."' and `user` = '".$qz1->id."') 
and `deleted_by` != '".$user['id']."') 
order by `mid` DESC limit 
".$ttlqzw21.", ".$set['p_str']."");


$kzddmsg = [];

while ($kdata = $kzftch->fetch()) { 
	
	
$psanzkz1 = new user($kdata['user']);	
	
	$kzddmsg[] = [
	'mid'=> $kdata['mid'],	
	'user' => $psanzkz1->id,
	'text'=> Escaped($kdata['text']), 
	'when'=> when($kdata['when']),
	'read'=> $kdata['read'],
	'pic' => $psanzkz1->photoRounded(48),
	'userwnick' => $psanzkz1->nick(),
];

	
}	

//sorting associative arrays  
asort($kzddmsg);


///////////////////////////





header("Content-type: text/json");


echo json_encode($kzddmsg);


//header("Content-type: text/html");	

//echo json_encode(['text'=> text($text1_32_blg)]);
//echo text($text1_32_blg);


//}
