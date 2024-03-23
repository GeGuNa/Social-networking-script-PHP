<?php

defined('in') or die('uups');

?>



<?

//$qkkzzz = new user(3582);
//$qkkzzz = new user(2);
//echo $qkkzzz->photo(48);


//echo sha256('qweqwe');

//var_dump($qkkzzz);


//echo ($qz123z_zz)."  :original <br>";


//foreach (hash_algos() as $v) {

       // $r = hash($v, $data, false);

      //  printf("%-12s %3d %s<br>", $v, strlen($r), $r);

//}



//echo hash('sha256', $ls123z2);




if (!isset($_SESSION['version'])) { 

include("type.php");

$browser_detect = new MobileDetect();

if ($browser_detect->isMobile()) {
	$_SESSION['version'] = 'wap';
	setcookie("version", 'wap', time()+60*60*24*7, "/");  
} else if ($browser_detect->isTablet()) {
	$_SESSION['version'] = 'wap';
	setcookie("version", 'wap', time()+60*60*24*7, "/");  
} else if ($browser_detect->isiPhone()) {
	$_SESSION['version'] = 'wap';
	setcookie("version", 'wap', time()+60*60*24*7, "/");  
}  else if ($browser_detect->isAndroidOS()) {
	$_SESSION['version'] = 'wap';
	setcookie("version", 'wap', time()+60*60*24*7, "/");  
}   else if ($browser_detect->isIOS()) {
	$_SESSION['version'] = 'wap';
	setcookie("version", 'wap', time()+60*60*24*7, "/");  
}  else {
	$_SESSION['version'] = 'web';
	setcookie("version", 'web', time()+60*60*24*7, "/");  	
}

}


if (isset($_SESSION['version'])) {
	$browser = $_SESSION['version']; 
} else { 
	$browser = $_COOKIE['version'];
}

//$browser = 'wap';


///////////////////////Cookie and Session  
if (isset($_COOKIE['sess_id']) && isset($_COOKIE['when'])) { 

$mynckathr = my_esc($_COOKIE['sess_id']);
$mynckathp = my_esc($_COOKIE['when']);


} else if(isset($_SESSION['sess_id']) && isset($_SESSION['when'])) { 

$mynckathr = my_esc($_SESSION['sess_id']);
$mynckathp = my_esc($_SESSION['when']);


} else {

$mynckathr = '';
$mynckathp = '';

}


if (!empty($mynckathr) && !empty($mynckathp))
{ 

$usrsess = $pdo->fetchOne("SELECT * FROM `user_sessions` WHERE `hash` = ? and `when` = ?", [$mynckathr, $mynckathp]);


if (!$usrsess) {
session_destroy();
setcookie('sess_id', '');
setcookie('when', '');

header('Location: /index.php');
exit;
} else {


$user = $pdo->fetchOne("SELECT * FROM `user` WHERE `id` = ?",[$usrsess['user_id']]);


if (!$user) {

session_destroy();
setcookie('sess_id', '');
setcookie('when', '');

header('Location: /index.php');
exit;
	
}

$usojbid = new user($user['id']);



$ips1=my_esc($_SERVER['REMOTE_ADDR']);
$uas1=my_esc($_SERVER['HTTP_USER_AGENT']);
$urls=my_esc($_SERVER['SCRIPT_NAME']);


if ($user['id']!=14)$dros=intval($user['time']+1);
else $dros=$user['time'];


///if activated

if ($user['active']==1) {

if ($user['online_showing']==0) {

$pdo->query("UPDATE `user` SET `browser` = ?,`date_last` = ?,`time` = ?,`url` = ?,`ip` = ?,`ua` = ? WHERE `id` = ?",[$browser,$time,$dros,$urls,$ips1,$uas1,$user['id']]);

} else {

$pdo->query("UPDATE `user` SET `hbrowser` = ?,`hlast` = ?,`hrul` = ?,`hip` = ?,`hua` = ? WHERE `id` = ?",[$browser,$time,$urls,$ips1,$uas1,$user['id']]);

}

} else {
	

$pdo->query("UPDATE `user` SET `hbrowser` = ?,`hlast` = ?,`hrul` = ?,`hip` = ?,`hua` = ? WHERE `id` = ?",[$browser,$time,$urls,$ips1,$uas1,$user['id']]);

	
}

/////////////////////

}


}

////////////////// auth end





if (isset($user)) {	
	
date_default_timezone_set($user['timezone']);

$set['p_str'] = $user['set_p_str'];

if ($pdo->queryFetchColumn("SELECT COUNT(*) FROM `ban` WHERE `id_user` = ? AND `time` > ?", [$user['id'], $time]) == 1 && $_SERVER['PHP_SELF']!="/ban.php") {
	header('Location: /ban.php');
	exit;
}  else if (($user['act']==0 || $user['act']==2) && $_SERVER['PHP_SELF']!="/act.php") {
	header('Location: /act.php');
	exit;
}  else if ($user['active']==0 && $user['act'] == 1 && $_SERVER['PHP_SELF']!="/deactivated.php") {
	header('Location: /deactivated.php');
	exit;
} else {
	//
}

} else {
	date_default_timezone_set('Asia/Tbilisi');
}





if (!isset($user) && !in_array($_SERVER['PHP_SELF'], 

array(
"/index.php",
"/page/registration/index.php",
"/page/recovery/index.php", 
"/page/rules/index.php", 
"/page/auth/index.php"
)

)

) {
header("Location: /page/auth/");
exit;
}
 


if (isset($_GET['response']) && isset($user)) {
	
if (!is_numeric($_GET['response'])){
header("Location: /index.php");
exit;
}
	
$reply = get_user($_GET['response']);
	
if (!$reply) {
	header("Location: /index.php");
	exit;
}

$insert = ''.$reply['nick'].', ';


if ($_SERVER['PHP_SELF']=='/page/admin/chat/index.php' || $_SERVER['PHP_SELF']=='/foto/foto.php')
	$go_link = '?response='.$reply['id'];	


/*
 
 
    if ($_SERVER['PHP_SELF']=='/foto/foto.php')$go_link = '&response='.$reply['id'];

 
	if (in_array($_SERVER['PHP_SELF'], array('/viqtorina/quiz/index.php','/viqtorina/brainy/index.php','/viqtorina/association/index.php')))$go_link = '?response='.$reply['id'];


*/
} else {
	
	$reply = NULL;
	$insert = NULL;
	$go_link = NULL;

}


?>
