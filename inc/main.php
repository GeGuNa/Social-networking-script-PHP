<?php

defined('in') or die('uups');

?> 



<?php



error_reporting(E_ALL); 
set_time_limit(60);


ini_set('display_errors',1);
ini_set('register_globals', 0);
ini_set('session.use_cookies', 1);
ini_set('session.use_trans_sid', 1);
ini_set('arg_separator.output', "&amp;"); 
$time=intval($_SERVER['REQUEST_TIME']);



$ftime = mktime(0, 0, 0);


ob_start(); 



session_start();
$sess = session_id();


define("H", $_SERVER["DOCUMENT_ROOT"].'/');




/*
 * 
 * 
 *  SET autocommit=0; source db.sql; COMMIT;
 * 
 * 
 * 
 *  alter table user add timezone default 'Asia/Tbilisi';
 * 
 * 
 * */
 
 
 
date_default_timezone_set('Asia/Tbilisi');


//mysql_set_charset('utf8mb4',$db);
//mysqli_set_charset("utf8mb4");

//mysql_query('SET names utf8mb4'); 
//mysql_query('set character_set_client="utf8mb4"');
//mysql_query('set character_set_connection="utf8mb4"'); 
//mysql_query('set character_set_result="utf8mb4"',$db);

$param = $pdo->fetchOne("SELECT * FROM `admin_site` WHERE `id` = '1'");
$set = $param;

if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip2['xff'] = $_SERVER['HTTP_X_FORWARDED_FOR'];$ipa = $_SERVER['HTTP_X_FORWARDED_FOR'];}
if(isset($_SERVER['HTTP_CLIENT_IP'])){$ip2['cli'] = $_SERVER['HTTP_CLIENT_IP'];$ipa = $_SERVER['HTTP_CLIENT_IP'];}
if(isset($_SERVER['REMOTE_ADDR'])){$ip2['add'] = $_SERVER['REMOTE_ADDR'];$ipa = $_SERVER['REMOTE_ADDR'];}




?>
