<?
include '../../inc/db.php';
include '../../inc/main.php';
include '../../inc/functions.php';
include '../../inc/user.php';





include '../../inc/header.php';

$qq = new Pagination();



	$kzftch322Randusr = $pdo->fetchOne("SELECT * FROM `user` order by rand() desc limit 1;");





$set['p_str'] = 10;

$usearch=NULL;
$usearch_loc = null;

if (isset($_GET['act']) && $_GET['act']=='males') {
	
$navigation='?act=males';
$activ='male';

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `gender` = 'male' and `act` = '1' and `id` != '$user[id]'");
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
$z1fusr1 = $pdo->query("SELECT `id` FROM `user` where `gender` = 'male' and `act` = '1' and `id` != '$user[id]' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");


} else if (isset($_GET['act']) && $_GET['act']=='females') {
	
$navigation='?act=females';
$activ='female';


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `gender` = 'female' and `act` = '1' and `id` != '$user[id]'");
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
$z1fusr1 = $pdo->query("SELECT `id` FROM `user` where `gender` = 'female' and `act` = '1' and `id` != '$user[id]' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");


} else if (isset($_GET['act']) && $_GET['act']=='leaders') {
	
$navigation='?act=leaders';
$activ='leaders';

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `leader` > '$time' and `act` = '1' and `id` != '$user[id]'");
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
$z1fusr1 = $pdo->query("SELECT `id` FROM `user` where `leader` > '$time' and `act` = '1' and `id` != '$user[id]' ORDER BY `leader` DESC LIMIT $ttlq, $set[p_str]");


} elseif (isset($_GET['search']) && strlen2($_GET['search'])>0) {
	
	
	



if (isset($_GET['Location']) && isset($_GET['Text']) && text_size($_GET['Location'])>0 && text_size($_GET['Text'])>0) {
	
	$usearch = my_esc($_GET['Text']);
	$usearch_loc = my_esc($_GET['Location']);
	
	$navigation='?search=1&Text='.when_editing($usearch).'&Location='.when_editing($usearch_loc).'';

} else if (isset($_GET['Location']) && text_size($_GET['Location'])>0) {
	
	$usearch = '';
	$usearch_loc = my_esc($_GET['Location']);
	
	$navigation='?search=1&Location='.when_editing($usearch_loc).'';

	
} else if (isset($_GET['Text']) && text_size($_GET['Text'])>0) {
	
	$usearch = my_esc($_GET['Text']);
	$usearch_loc = '';
	
	$navigation='?search=1&Text='.when_editing($usearch).'';

	
}
	
	
$k1pzll = filter($usearch);

$act = '1';
$c2z1z = '%'.$usearch.'%'; // Assuming $usearch contains the search term
$id = 1;



if (text_size($usearch_loc)>0) {
	
$c2z1zlocEcnoded = '%'.$usearch_loc.'%';

if (text_size($usearch)>0) {
	
$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `act` = '1' and `ank_city` Like ? and `id` != '$user[id]' and `nick` like ?",[$c2z1zlocEcnoded, $c2z1z]);	
	
} else {


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `act` = '1' and `ank_city` like ? and `id` != '$user[id]'",[$c2z1zlocEcnoded]);

}

$ttlq = $qq->calculation($kzftch322, $set['p_str']);


if (text_size($usearch)>0) {
	
	$z1fusr1 = $pdo->query("SELECT `id` FROM `user`  where `act` = '1' and `ank_city` like ? and `id` != '$user[id]' and `nick` like ?
		ORDER BY `id` DESC LIMIT ".$ttlq.", ".$set['p_str']."",[$c2z1zlocEcnoded, $c2z1z]);
		
} else {
	
	$z1fusr1 = $pdo->query("SELECT `id` FROM `user`  where `act` = '1' and `ank_city` like ? and `id` != '$user[id]'
		ORDER BY `id` DESC LIMIT ".$ttlq.", ".$set['p_str']."",[$c2z1zlocEcnoded]);
		
}

$order="`id` DESC";

$activ='all';
	
	
	
	
} else {
	
	


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `act` = '1' and `nick` LIKE ?  and `id` != '$user[id]'",[$c2z1z]);


$ttlq = $qq->calculation($kzftch322, $set['p_str']);



$z1fusr1 = $pdo->query("SELECT `id` FROM `user` where `act` = '1' and `nick` LIKE ? and `id` != '$user[id]' ORDER BY `id` DESC LIMIT ".$ttlq.", ".$set['p_str']."",[$c2z1z]);


$navigation='?search=1&Text='.when_editing($usearch).'';

$order="`id` DESC";

$activ='all';
	
	
	
}




} else if (isset($_GET['act']) && $_GET['act']=='with_Photos') {
	
$navigation='?act=with_Photos';
$activ='';

$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user`  
JOIN   `gallery_foto`  ON 
	`gallery_foto`.`id_user` = `user`.`id`  and `gallery_foto`.`avatar` = '1' and `user`.`id` != '$user[id]'");


$ttlq = $qq->calculation($kzftch322, $set['p_str']);


$z1fusr1 = $pdo->query("SELECT `user`.`id` FROM  `user` 

JOIN   `gallery_foto`  ON 
	`gallery_foto`.`id_user` = `user`.`id`    and `gallery_foto`.`avatar` = '1' and `user`.`id` != '$user[id]'
	

 ORDER BY `user`.`id` DESC LIMIT $ttlq, $set[p_str]");



} else {
	
$navigation='';
$activ='all';


$kzftch322 = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `user` where `act` = '1' and `id` != '$user[id]'");
$ttlq = $qq->calculation($kzftch322, $set['p_str']);
$z1fusr1 = $pdo->query("SELECT `id` FROM `user` where `act` = '1' and `id` != '$user[id]' ORDER BY `id` DESC LIMIT $ttlq, $set[p_str]");




}


if (isset($_GET['search']) && strlen2($_GET['search'])>0){
	$usearch2lk2kug = when_editing($usearch);
	$usearch2lk2kug_zqw = when_editing($usearch_loc);
	$activ='all';
} else {
	$usearch2lk2kug = '';
	$usearch2lk2kug_zqw = '';
}
		








if ($user['version']!='web') {

	title();
	aut();

} else {
	
	webPage();

}

?>


	<?  if ($user['version']=='web') { ?>

		<div class="forNewTopMarginated"></div>

		<div class="forNewqzzNcontMaxWidth">

	<? } ?>





	<div class="froNewStyleContainerFlexing">

		<div class="forNewStyleWeb_FirsTRow">
			
				<div class="firstRow90perC">
					
							
							<!-- -->
							<div class="podng1015X">
							
								<div class="dispFlexWigap">
									
											<div><?echo $usojbid->photo2('128','70','70'); ?></div>
										
											<div class="falignceslef1z">
													<div><?echo $usojbid->NickWithLinkForUser(); ?></div>
													<div class="Post_AlmostWhite"><?echo $usojbid->UserFullname(); ?></div>
											</div>
								</div>
								
								<div class="mmqwWebMrgq Post_user_STextbuttonFirst" onclick="window.location='/user/friends/?id=<?=$user['id'];?>';">
									Friends
								</div>
								
							</div>
							
							<!-- -->
				
				<div class="flexingWebFirs1zRow1z">
					<div onclick="rRRedRction('?');" class="kkTopBrdq1za kkwEBUSRlImENUN"><i class="kColor12 fa-solid fa-house-chimney"></i> Home</div>
					<div onclick="rRRedRction('?act=leaders');" class="kkwEBUSRlImENUN"><i class="kColor12 fa-solid fa-fire"></i> Popular users</div>
					<div onclick="rRRedRction('?act=with_Photos');" class="kkwEBUSRlImENUN"><i class="kColor12 fa-regular fa-image"></i> With photo</div>
					<div onclick="rRRedRction('/profile.php?id=<?=$kzftch322Randusr['id'];?>');" class="kkwEBUSRlImENUN2"><i class="kColor12 fa-solid fa-user"></i> Random user</div>
				</div>
				
				
				
				
				</div>	
					
			

		</div>




		<div class="forNewStyleWeb_SecondRow">



<div class="kAppPagePhtUsersHeading">
		<div class="klmanchlq1illumniation"></div>
		<div class="knmaninhedq123q">People</div>
		<div class="lmkmnaingq331">All members from our website you will see here</div>
</div>








<div class="ContainerForDivs">

<form method="get" action="?">
	
<div class="czntussrchglb">	
	
	<div class="czntussrchglb90">
		
		<div class="kkSlqzWidhqWcrq123z">
			
			
			
			
		<div class="ww_Width50">
			
			<div class="ww_Width95">
				<input type="text" placeholder="Location" name="Location" maxlength="32" value="<?=$usearch2lk2kug_zqw;?>">
			</div>
		</div>
		
		
		
		<div class="ww_Width50">
			<div class="ww_Width95">
			<input type="text" placeholder="Searching for" name="Text" maxlength="32" value="<?=$usearch2lk2kug;?>">
			</div>
		</div>
		
		
		</div>
		
		
		
		
		
	</div>	

	<div class="czntussrchglb10 phAlcntrDv">
			<button type="submit" name="search" value="1" class="k_srhchMinq1zz"><i class="fa fa-search"></i> Find</button>
	</div>

</div>	

 
</form>
</div>






<div class="pBlueWw2">
	
	<div class="lLTl21zblt <?if ($activ=='all')echo 'active';?>"> 
	<a href="?">All </a>
	</div>	

	<div class="lLTl21zblt <?if ($activ=='male')echo 'active';?>"> 
	<a href="?act=males">Boys </a>
	</div> 


	<div class="lLTl21zblt <?if ($activ=='female')echo 'active';?>">  
	<a href="?act=females">Girls </a>
	</div>
	

	<div class="lLTl21zblt <?if ($activ=='leaders')echo 'active';?>"> 
	<a href="?act=leaders">Leaders </a>
	</div>		
	
</div>










<? while ($ank = $z1fusr1->fetch()){

	
$fank = new user($ank['id']);

	
$k_pozst = $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '$user[id]' AND `who` in (select `who` from `friends` where user = '$fank->id')");	
	
	
$friends =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");


$friends_new =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE (`user` = '".$user['id']."' AND `who` = '".$ank['id']."') OR (`user` = '".$ank['id']."' AND `who` = '".$user['id']."')");


$friends_newbythem =  $pdo->queryFetchColumn("SELECT COUNT(*) FROM `friends_requests` WHERE `user` = '".$user['id']."' AND `who` = '".$ank['id']."'");

	
if ($user['id']!=$fank->id) {
		
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

}
	
	
	
?>
	
	
	







<div class="frlst21_22">




<div>	
	
<div class="pchrt21">
	
<div>
	
	<?=$fank->PhotoForUserZs();?>

</div>	

<div class="dflexAcenter">

    
	
	
	<div><?echo $fank->NickWithLinkForUser(); ?></div>
	
	
	<div class="Post_AlmostWhite"><?echo $fank->UserFullname(); ?></div>
	
	
	<? if (text_size($fank->ank_city)>0) { ?>
	<div><span class="Post_AlmostWhite"><svg stroke="currentColor" fill="none" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path></svg> <?echo detect($fank->ank_city);?></span> </div>
	
		<? } ?>
	
	
	
	
	<? if ($user['id']!=$fank->id && $k_pozst>0) { ?>	
	<div><a class="date" href="/user/friends/?id=<?=$fank->id;?>&type=common"><?=$k_pozst;?> Common</a></div>
	<? } ?>
	

	
	
</div>


</div>	
		


</div>




	<div class="dflexAcenter">
		
		<div class="K_user_SlfSecondRow">
			<div class="Post_user_STextbuttonFirst" onclick="window.location='/mail/who.php?who=<?=$fank->id;?>';">Message</div>
		<? if ($user['id']!=$fank->id) { ?>	
			<div class="Post_user_STextbuttons" onclick="window.location='<?=$uadfrqwe;?><?=$ank['id'];?>';"><?=$uadfrqwet;?></div>
		<? } ?>
		</div>

	</div>

</div>




<? } ?>



<?



$qq->setPage("/page/users/", "$navigation");
$qq->setTotal($kzftch322);
$qq->setPerPage($set['p_str']);

$qq->rendering();



?>





		</div>




	</div>






<?  if ($user['version']=='web') { ?>

</div>

<? } ?>




<?  if ($user['version']!='web') { include '../../inc/footer.php'; } ?>
