<?
 
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';







if ($user['level']<1 || $user['level']==0) {
	header("location: /");
	exit;
}


include '../../inc/header.php';
title();
aut();




$allus=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user`");
$sp=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `reporting`");

$admins=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `level` > '0'");
$k_nsss123213=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `adm_chat` WHERE `time` > '".intval($time-86400)."'");
$online=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > '".intval($time-60*10)."'");
$dayonline=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > '".intval($time-86400)."'");
$regist=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `date_reg` > '".intval($time-86400)."'");
$kvirashi=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_reg` > '".(time()-86400*7)."'");
$tveshi=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_reg` > '".(time()-86400*30)."'");


$gogo=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `gender` = 'female'");
$bich=$pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `gender` = 'male'");


$p21 = $allus*100;
$p1=$gogo;
$p2=$bich;

?>


<div class="nav2">Admin links</div>
<div class='nav2'>
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M19 4H6V2H4v18H3v2h4v-2H6v-5h13a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1z"></path></svg> <a href='/page/admin/spam'>Reports</a> 
<span class='counter' style='color: #ff0000;'><?=$sp;?></span>
</div>


<div class='nav2'>
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897V12H5.51a15.473 15.473 0 0 1-.544-4.365L12 4.118V12h6.46c-.759 2.74-2.498 5.979-6.46 7.897z"></path></svg> <a href='/page/admin/chat'>Admin chat</a> 
<span class='counter' style='color: #ff0000;'>
<?=$k_nsss123213;?> 
</span>
</div>


<div class='nav2'>
<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M256 176a80 80 0 1080 80 80.24 80.24 0 00-80-80zm172.72 80a165.53 165.53 0 01-1.64 22.34l48.69 38.12a11.59 11.59 0 012.63 14.78l-46.06 79.52a11.64 11.64 0 01-14.14 4.93l-57.25-23a176.56 176.56 0 01-38.82 22.67l-8.56 60.78a11.93 11.93 0 01-11.51 9.86h-92.12a12 12 0 01-11.51-9.53l-8.56-60.78A169.3 169.3 0 01151.05 393L93.8 416a11.64 11.64 0 01-14.14-4.92L33.6 331.57a11.59 11.59 0 012.63-14.78l48.69-38.12A174.58 174.58 0 0183.28 256a165.53 165.53 0 011.64-22.34l-48.69-38.12a11.59 11.59 0 01-2.63-14.78l46.06-79.52a11.64 11.64 0 0114.14-4.93l57.25 23a176.56 176.56 0 0138.82-22.67l8.56-60.78A11.93 11.93 0 01209.94 26h92.12a12 12 0 0111.51 9.53l8.56 60.78A169.3 169.3 0 01361 119l57.2-23a11.64 11.64 0 0114.14 4.92l46.06 79.52a11.59 11.59 0 01-2.63 14.78l-48.69 38.12a174.58 174.58 0 011.64 22.66z"></path></svg> <a href='/apanel/'>Managing website</a> 
</div>



<div class="nav2">Files</div>


	<div class='nav2'>
	<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M5 12H4v8a2 2 0 0 0 2 2h5V12H5zm13 0h-5v10h5a2 2 0 0 0 2-2v-8h-2zm.791-5A4.92 4.92 0 0 0 19 5.5C19 3.57 17.43 2 15.5 2c-1.622 0-2.705 1.482-3.404 3.085C11.407 3.57 10.269 2 8.5 2 6.57 2 5 3.57 5 5.5c0 .596.079 1.089.209 1.5H2v4h9V9h2v2h9V7h-3.209zM7 5.5C7 4.673 7.673 4 8.5 4c.888 0 1.714 1.525 2.198 3H8c-.374 0-1 0-1-1.5zM15.5 4c.827 0 1.5.673 1.5 1.5C17 7 16.374 7 16 7h-2.477c.51-1.576 1.251-3 1.977-3z"></path></svg> <a href='/apanel/gifts'>Gifts</a> 
	</div>


<div class='nav2'>Site statistics</div>
<div class="nav2" style="text-align: left; color: #848E83; font-size: 16px;">

Totally we have  <span style="color:#0B610B;"><?=$allus;?></span> users and <span style="color:#DF7401;"><?=$admins;?></span> admins <br>



on the website there's <span style="color:#FF0040;"><?=$p1;?></span> Girls and  <span style="color:#29088A;"><?=$p2;?></span> Boys ...<br>

in last 24 hours totally registered  <span style="color:#4C0B5F;"><?=$regist;?></span> . <br>
in last week - <span style="color:#0B615E;"><?=$kvirashi;?></span>,  in the last month - <span style="color:#868A08;"><?=$tveshi;?></span>. <br>
in the last 10 min here was <span style="color:#8A0829;"><?=$online;?></span> users online .<br> 
in last 24 hours - <span style="color:#02031A;"><?=$dayonline;?></span>.<br>
</div>











<?
include '../../inc/footer.php';
?>
