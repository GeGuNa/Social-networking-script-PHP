<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';







if (!isset($_GET['id'])){
	redirection("/index.php");
}

if (!is_numeric(get('id'))) {
	redirection("/index.php");
}


$idofu =  filter(get('id'));

$qz = new user($idofu);


if ($qz->user == NULL) {
	redirection("/index.php");
}

$ank = get_user($qz->id);


$my_black =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user_ignor` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");


$friends =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");


$friends_new =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE (`user` = '".$user['id']."' AND `who` = '".$ank['id']."') OR (`user` = '".$ank['id']."' AND `who` = '".$user['id']."')");


$friends_newbythem =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");


include '../inc/header.php';
title();
aut();



/*-------------------close / ignor / off / block------------------*/


if ($user['id']!=$ank['id']) {


if_blocked($ank);

if_blacklisted($ank);

if_closed($ank);

}


/*-------------------end------------------*/





?>



<div class="cqwe_zz_2t1cq1231">

	<div><?=$qz->photo3(48);?></div>
	
	<div class="us_gf_pd">
		<div><span><?=$qz->nick();?></span></div>
		<div class="czntkwqpprq">view profile</div>
	</div>

</div>




<div class="pcstpgnr2z21dvt21">
	<a href="/mail/who.php?who=<?=$ank['id'];?>"> <span class="p2p2plf1 material-symbols-outlined">mail</span> Message </a>
</div>
	



<?

$uadfrqwe = '';
$uadfrqwet = '';

if ($user['id']!=$qz->id) {

if ($friends_newbythem>0) {
	$uadfrqwe = "/user/friends/create.php?accepting=";
	$uadfrqwet = "Accept request";
} else if ($friends_new>0) {
	$uadfrqwe = "/user/friends/create.php?unrequest=";
	$uadfrqwet = "Unrequest";
} else if ($friends>0) {
	$uadfrqwe = "/user/friends/create.php?remove=";
	$uadfrqwet = "Unfriend";
} else {
	$uadfrqwe = "/user/friends/create.php?send=";
	$uadfrqwet = "Befriend";
}

?>


<div class="pcstpgnr2z21dvt21">
	<a href="<?=$uadfrqwe;?><?=$ank['id'];?>"> <span class="p2p2plf1 material-symbols-outlined">person_add</span> <?=$uadfrqwet;?></a>
</div>


<?

}

?>






	
<? if ($my_black>0) { ?>
	
<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">block</span> <a href="/info.php?id=<?=$qz->id;?>&ignor=del">  Unblock</a>
</div>	

<? } else { ?>

<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">block</span> <a href="/info.php?id=<?=$qz->id;?>&ignor=add">  Block</a>
</div>		

<? } ?>



<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">flag</span> <a href="#">  Report</a>
</div>	



<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">volunteer_activism</span> 
	<a href="/user/gifts.php?id=<?=$qz->id;?>">Sending a gift </a>
 </div>


<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">ballot</span> <a href="/user/polls.php?id=<?=$qz->id;?>">  User polls </a></div>

<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">movie</span> <a href="/user/videos.php?id=<?=$qz->id;?>">  User videos </a></div>

<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">newspaper</span> <a href="/page/notes/user.php?id=<?=$qz->id;?>">   User blogs </a></div>


<? if ($user['level']>$ank['level'] || $user['level']>0 && $user['level']>0) { ?>
	
<div class="pcstpgnr2z21dvt21">
<span class="p2p2plf1 material-symbols-outlined">admin_panel_settings</span>  	<a href="/apanel/profile.php?id=<?=$qz->id;?>"> Admin stuff</a>
</div>	

<? } ?>



<?
include '../inc/footer.php';

?>
