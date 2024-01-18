<?php


include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';

if (!isset($user)) {
exit;	
}
	

if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
	exit;
}

$kndata = filter($_GET['id']);

$notes = $pdo->fetchOne("SELECT * FROM `notes` WHERE `id` = ?", [$kndata]);

if (!$notes)
{
	exit;
}
	
	
$text1_32_blg = '';	
	
 if (strlen2($notes['image'])>1) {
	//$text1_32_blg.="<div><img src='/page/notes/images/".detect($notes['image']).".jpg' style='width: calc(100%);'></div>";
	$imge_zblgk21z = detect($notes['image']);
 }  else {
	 $imge_zblgk21z = '';
 }
	
	
$text1_32_blg = $notes['msg'];


header("Content-type: text/json");



echo json_encode([
'text'=> text($text1_32_blg),
'image' => $imge_zblgk21z
]

);


//header("Content-type: text/html");	

//echo json_encode(['text'=> text($text1_32_blg)]);
//echo text($text1_32_blg);


//}
