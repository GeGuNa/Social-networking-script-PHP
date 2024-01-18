<?
include 'inc/db.php';
include 'inc/main.php';
include 'inc/functions.php';
include 'inc/user.php';
include 'inc/header.php';
title();
aut();

$qq = new Pagination();


$ons = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".($time-$set['online'])."");
$ong = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".($time-$set['online'])." AND `gender` = 'female'");
$onb = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` WHERE `date_last` > ".($time-$set['online'])." AND `gender` = 'male'");





 

if (isset($_GET['act']) && $_GET['act']=='females') {
	
	
	$active="`gender` = 'female' and";
	$navigation='?act=females';
	$activ='female';



	$kz_mfhmn1_213 = $ong;


	$ttlq = $qq->calculation($kz_mfhmn1_213, $set['p_str']);

	$qfetch = $pdo->query("SELECT * FROM `user` WHERE $active `date_last` > '".intval($time-$set['online'])."' ORDER BY `date_last` DESC LIMIT $ttlq, $set[p_str]");


	
	
} else if (isset($_GET['act']) && $_GET['act']=='males') {
	
	
	$active="`gender` = 'male' and";
	$navigation='?act=males';
	$activ='male';
	
	
	$kz_mfhmn1_213 = $onb;


	$ttlq = $qq->calculation($kz_mfhmn1_213, $set['p_str']);

	$qfetch = $pdo->query("SELECT * FROM `user` WHERE $active `date_last` > '".intval($time-$set['online'])."' ORDER BY `date_last` DESC LIMIT $ttlq, $set[p_str]");

		
	
	
	
} else if (isset($_GET['search']) && strlen2($_GET['search'])>0) {
	
	$usearch = my_esc($_GET['search']);
	$k1pzll = filter($usearch);

	$act = '1';
	$c2z1z = '%'.$usearch.'%'; // Assuming $usearch contains the search term
	$id = 1;

	$navigation='?search='.when_editing($usearch).'';

	$kz_mfhmn1_213 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `date_last` > ".($time-$set['online'])." and `nick` LIKE ? OR `id` = ?",[$c2z1z, $k1pzll]);


	$ttlq = $qq->calculation($kz_mfhmn1_213, $set['p_str']);



	$qfetch = $pdo->query("SELECT `id` FROM `user` where `date_last` > ".($time-$set['online'])." and `nick` LIKE ? OR `id` = ? ORDER BY `id` DESC LIMIT ".$ttlq.", ".$set['p_str']."",[$c2z1z, $k1pzll]);


	$navigation='?search='.when_editing($usearch).'';

	$activ='all';







} else {
	
	
	$active="`id` > '0' and";
	$navigation='';
	$activ='all';
	
	
	
	$kz_mfhmn1_213 = $ons;


	$ttlq = $qq->calculation($kz_mfhmn1_213, $set['p_str']);

	$qfetch = $pdo->query("SELECT * FROM `user` WHERE $active `date_last` > '".intval($time-$set['online'])."' ORDER BY `date_last` DESC LIMIT $ttlq, $set[p_str]");

		
		
	
	
}



if (isset($_GET['search']) && strlen2($_GET['search'])>0){
	$usearch2lk2kug = when_editing($usearch);
	$activ='all';
} else {
	$usearch2lk2kug = '';
}





?>





<div class="kAppPagePhtUsersHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">Online users</div>
		<div class="lmkmnaingq331">Who is at online?</div>
</div>


	
	
<!--
	<div class="PFlexList">
	<div class="pFlexWidth1"><a class="PFlexListChildrens">Boys</a></div>
	<div class="pFlexWidth1"><a class="PFlexListChildrens">Girls</a></div>
	<div class="pFlexWidth1"><a class="PFlexListChildrens">All</a></div>
	</div>	
-->
	
	
	
	

<div class="ContainerForDivs">

<form method="get" action="?">
	
<div class="czntussrchglb">	
	
<div class="czntussrchglb90">
	<input type="text" placeholder="Nickname or id " name="search" maxlength="32" value="<?=$usearch2lk2kug;?>">
</div>	

<div class="czntussrchglb10 phAlcntrDv">
		<button type="submit" class="k_srhchMinq1zz"><i class="fa fa-search"></i> Find</button>
</div>


</div>	

 
</form>
</div>
 


<div class="pBlueWw2">
	
<div class="lLTl21zblt <?if ($activ=='all')echo 'active';?>"> 
<a href="?">All <?=$ons;?></a>
</div>	

<div class="lLTl21zblt <?if ($activ=='male')echo 'active';?>"> 
<a href="?act=males">Boys <?=$onb;?></a>
</div> 


<div class="lLTl21zblt <?if ($activ=='female')echo 'active';?>">  
<a href="?act=females">Girls <?=$ong;?></a>
</div>
	
	
</div>






<?







if ($kz_mfhmn1_213 == 0){	
	echo "<div class='mess'>";	
	echo "Empty";	
	echo "</div>";
}


?>







<? while ($ank = $qfetch->fetch()){

$fank = new user($ank['id']);
	




	
if ($user['level']>0){
	$phzst211 = '80';
} else {
	$phzst211 = '60';
}	
	
	
?>



<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div><?echo $fank->photo50(128,$phzst211,$phzst211,'50%'); ?></div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->nick(); ?></div>
	<div>	<?php echo $fank->gender();?>, <?php echo $fank->age('en');?> </div>
	<? if ($user['level'] > 0){  ?>
	<div>When: <?=Where($fank->url); ?></div>
	<? } ?> 


	
	
</div>


</div>	
		


</div>




<div class="dflexAcenter">


	
<span onclick="ShowThings(this)" class="Drpdnw material-symbols-outlined CursorUser"  data_id="<?=$fank->id;?>">more_horiz</span>


<div class="drpdmain" pstevents="<?=$fank->id;?>" style="display: none;">
	
	
<div class="drpd">


<? if ($fank->id != $user['id']) { ?>
<div>
	<span class="material-symbols-outlined">Send</span> 
	<a href="/mail/who.php?who=<?=$fank->id;?>">Message</a>
</div>
<? } ?>

<div>
	<span class="material-symbols-outlined">group</span> 
	<a href="/user/frends/?id=<?=$fank->id;?>">Friend list</a>
</div>

</div>


</div>




</div>

</div>











<? } ?>







<?


$qq->setPage("/online.php", "$navigation");
$qq->setTotal($kz_mfhmn1_213);
$qq->setPerPage($set['p_str']);

$qq->rendering();

include 'inc/footer.php';
?>
