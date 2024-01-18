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


<div class="brdtwq11">Choose the category</div>


<div class="pcstpgnr2z21dvt21">
 <span class="p2p2plf1 material-symbols-outlined">volunteer_activism</span>	<a href="/user/gift/categories.php?id=<?=$qz->id;?>"> Gifts </a>
</div>
	
<div class="pcstpgnr2z21dvt21">
<span class="p2p2plf1 material-symbols-outlined">sentiment_very_satisfied</span>	<a href="/user/stickers/?id=<?=$qz->id;?>">  Stickers</a>
</div>
	
	
	
<div class="pcstpgnr2z21dvt21">
<span class="p2p2plf1 material-symbols-outlined">monetization_on</span>	<a href="/user/balls.php?id=<?=$qz->id;?>">  Balls </a>
</div>





<?

include '../inc/footer.php';

?>
