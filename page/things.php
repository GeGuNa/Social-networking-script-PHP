<?
include '../inc/db.php';
include '../inc/main.php';
include '../inc/functions.php';
include '../inc/user.php';




$qz = new user($user['id']);


include '../inc/header.php';
title();
aut();






?>



<div class="cqwe_zz_2t1cq1231">

	<div><?=$qz->photo3(48);?></div>
	
	<div class="us_gf_pd">
		<div><span><?=$qz->nick();?></span></div>
		<div class="czntkwqpprq">view profile</div>
	</div>

</div>





<!-- -->


<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">nest_clock_farsight_analog</span> <a href="/user/auth.php">  My activity</a>
</div>	




<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">volunteer_activism</span> <a href="/user/gift/">  My gifts</a>
</div>	



<!-- -->




	
<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">block</span> <a href="/user/ignor/">  Blacklisted</a>
</div>	



<div class="pcstpgnr2z21dvt21">
	<span class="p2p2plf1 material-symbols-outlined">sentiment_very_satisfied</span> <a href="/user/stickers.php?id=<?=$user['id'];?>">  Stickers</a>
</div>	





<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">ballot</span> <a href="/user/polls.php?id=<?=$user['id'];?>">  My polls </a></div>
<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">movie</span> <a href="/page/video/my.php?id=<?=$user['id'];?>">  My videos </a></div>
<div class="pcstpgnr2z21dvt21"><span class="p2p2plf1 material-symbols-outlined">newspaper</span> <a href="/page/notes/user.php?id=<?=$user['id'];?>">   My blogs </a></div>







<?
include '../inc/footer.php';

?>
